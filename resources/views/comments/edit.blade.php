@extends('master_app')
@section('content') 

  <h2>Edit Comment</h2>

   {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
   {{ Form::label('name', 'Name:') }}
   {{ Form::label('name', null, ['class' => 'form-control', 'disabled' => '']) }}

   {{ Form::label('email', 'Email:') }}
   {{ Form::label('email', null, ['class' => 'form-control', 'disabled' => '']) }}

   {{ Form::label('comment', 'Comment:')}}
   {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

   {{ Form::submit('Update Comment', ['class' => 'btn btn-block, btn-danger', 'style' => 'margin-top: 15px']) }}
   {{ Form::close() }}

  @endsection
