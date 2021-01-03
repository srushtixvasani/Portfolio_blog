@extends('master_app')

  @section('content') 

<div class="row mt-5 py-5" >

  <div class="col-lg-12 col-md-6 col-sm-6">

    <div class="card text-white bg-danger mb-3 text-center my-5 mx-auto" style="max-width: 40rem;">
      <div class="card-header">
        <h1> Hashtag: {{ $tag->name }} 
        </h1>
      </div>

      <div class="card-body">
        <h1>
          <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-light btn-block">
            Edit Tag
          </a>
        </h1>
        {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\TagController@destroy', $tag->id]]) !!}
        {!! Form::submit('Delete Tag', ['class'=>'btn btn-light btn-block']) !!} 
        {!! Form::close() !!}
        <h1 class="my-2">
          <a href="{{ route('tags.index') }}" class="btn btn-light btn-block">
            
            Back to hashtags
          </a>
        </h1>
      </div>
    </div>
  </div>
</div>

@endsection