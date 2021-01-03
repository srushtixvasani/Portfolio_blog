@extends('master_app')

@section('content') 

    <div class="row py-5 mt-5 d-flex justify-content-center text-center">
        <div class="container" style="color:white;">
            <h1>Are you sure you want to delete the comment?</h1>
            <p>
                <strong>Name: {{ $comment->name }}</strong> <br>
                <strong>Email: {{ $comment->email }}</strong> <br>
                <strong>Comment: {!! $comment->comment !!}</strong> 
            </p>
            {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'PUT']) }}
            {{ Form::submit( 'DELETE COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
