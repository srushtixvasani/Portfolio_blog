<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Session;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));

    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:250']);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('successaction', 'Tag was stored succesfully!');
        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        return view('tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
    
        $tag->name = $request->name;
        $tag->save();
    
        Session::flash('successaction', 'Tag was saved successfully');
    
        return redirect()->route('tags.show', $tag->id);
    }
    

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();

        $tag->delete();

        Session::flash('successaction', 'Tag was deleted');

        return redirect()->route('tags.index');
    }
}
