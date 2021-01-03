<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Session;
use Mail;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->limit(100)->get();
        return view('pages.central', compact('posts'));
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
    public function store(Request $request)
    {
        //
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
        //
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
    }

        
    public function contact()
    {
        return view('pages.contact');
    }

    public function contactfunc(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'subject' => 'min:3', 'message' => 'min:5']);

        $data = array('email' => $request->email, 'subject' => $request->subject, 'contentofmessage' => $request->message); 
        
        // mail provider using mailtrap.io
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('srushtivasani@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('successaction', 'The email has been sent!');
        return view('pages.contact');
    }
}
