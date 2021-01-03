<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Image;
use Session;
use Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pagination
        $posts = Post::simplePaginate(8);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories','tags'));
    }

    public function store(Request $request) 
    {

        // dd($request);
        $formInput=$request->except('image');

        $this->validate($request, ['title' => 'required|max:250',
         'slug' => 'required|alpha_dash:min:5|max:250|unique:posts,slug',
         'category_id' => 'required|integer',
         'caption' => 'required',
         'image' => 'image|mimes:jpg,jpeg,png|max:20000']);

         $image=$request->image;

         if($image){
             $imageName=$image->getClientOriginalName();
             $image->move('imgs', $imageName);

             $formInput['image']=$imageName;
         }

        $post= Post::create($formInput);
    


        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = $request->slug;
        // $post->category_id = $request->category_id;
        // // $post-> caption = $request->caption;
        // $post->caption = Purifier::clean($request->caption);
        // $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('successaction', 'Your post was successfully saved.');

        return redirect()->route('posts.show', $post->id);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        
        return view ('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();
        $showcat = [];

        foreach ($categories as $category) {

            $showcat[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $showtags = [];

        foreach ($tags as $tag) {
            $showtags[$tag->id] = $tag->name;
        }

        return view('posts.edit', compact('post', 'showcat', 'showtags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // // // validate the data
        // $this->validate($request, ['title' => 'required|max:250',
        // 'slug' => 'required|alpha_dash:min:5|max:250|unique:posts,slug',
        // 'caption' => 'required']);

        // variables to save updated data to database
        $post = Post::find($id);


        if($request->input('slug') == $post->slug) 
        {
            $this->validate($request, ['title' => 'required|max:250',
            'category_id' => 'required|integer',
            'caption' => 'required']);
        } else {
            $this->validate($request, ['title' => 'required|max:250',
            'slug' => 'required|alpha_dash:min:5|max:250|unique:posts,slug',
            'category_id' => 'required|integer',
            'caption' => 'required']);
        }

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        // $post->caption = $request->input('caption');
        $post->caption = Purifier::clean($request->caption);
        $post->save();
        $post->tags()->sync($request->tags);

        // to alert the user that post has been updated
        Session::flash('successaction', 'The post has been updated!');
        return redirect()->route('posts.show', $post->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();

        $post->delete();
        //alerts the user that the post has been deleted
        Session::flash('successaction', 'The post was deleted.');
        return redirect()->route('posts.index');
    }
}
