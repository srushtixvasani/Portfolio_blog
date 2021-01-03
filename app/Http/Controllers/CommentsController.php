<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

use Session;

use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        // validation
        $this->validate($request, ['name' => 'required|max:300', 
        'email' => 'required|email|max:150', 'comment' => 'required|min:2|max:5000']);

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email =$request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();

        Session::flash('success', 'Your comment was posted!');
        return redirect()->route('blog.comment', [$post->slug]);


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comment = Comment::find($id);
        return view('comments.edit',compact('comment'));
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

        $comment = Comment::find($id);

        //validation
        $this->validate($request, [ 'comment' => 'required' ]);

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('successaction', 'The comment was updated');

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        return view('comments.delete', compact('comment'));
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
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();
        Session::flash('successaction', 'Comment has been deleted');

        return redirect()->route('posts.show', $post_id);
    }
}
