@extends('master_app')

@section('content')

<div class="row py-4 mt-5 d-flex justify-content-center" >
        
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                <div class="card h-100 ">
                    <div class="card-header"> 
                        <h5 class="card-title">{{ $post -> title }}</h5>
                        <img src="{{ url('imgs',$post->image) }}" class="card-img-top img-fluid" width="50px" alt="Card image cap">
                    </div>
                    <div class="card-body">      
                        <p class="card-text"> 
                            caption: {!! $post -> caption !!}
                        </p>
                        <p class="card-text">
                            category: {{ $post->category->name }}
                        </p>
                        <br>
                        <hr>
                        <h4>
                        <i class="fas fa-comments"></i>
                        comments</h4>
                        @foreach($post->comments as $comment)
                            <div class="card mb-2">
                                <div class="card-header pb-0">
                                <!-- puts an image with the comment -->
                                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=identicon" }}" class="gravatar-image">
                                <h4 class="pt-2">Comment by: {{ $comment->name }}</h4>
                                <p> 
                                        COMMENTED: {{ substr(strip_tags($comment -> comment), 0, 50) }}
                                        {{ strlen(strip_tags($comment -> comment)) > 50 ? "..." : "" }}
                                 </p>
                                </div>
                            </div>
                        @endforeach
                        <br>
                        <hr>
                        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                            <div class="card">
                                <div class="card-header">
                                    Comments
                                </div>
                                <div class="card-body">
                                    {{ Form::label('name', "Name:") }}
                                    {{ Form::text('name', null, ['class' => 'card-text','style' => 'width:100%']) }}


                                    {{ Form::label('email', 'Email:') }}
                                    {{ Form::text('email', null, ['class' => 'card-text','style' => 'width:100%']) }}


                                    {{ Form::label('comment', "Comment:") }}
                                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                                    {{ Form::submit('Add comment', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:15px;']) }}
                                </div>
                            </div>
                            <br>
                        {{ Form::close() }}
                             
                        <div class="card-footer">
                            <a class="btn btn-danger ml-2" href="{{ route('posts.show', $post->id) }}">
                                <i class="fas fa-eye"></i>
                                view 
                            </a> 
                            <a class="btn btn-danger mr-2" href="{{ route('posts.edit', $post->id) }}"> 
                                <i class="far fa-edit"></i>
                                edit
                            </a> 
                        </div>
                    </div>
            </div>    
    </div> 
@endsection