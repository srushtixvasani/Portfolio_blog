@extends ('master_app')

@section('content')

    <div class="card border-light text-center my-5 mx-auto" id="blogMessage" >
            <div class="card-header"> 
            <h4 class="card-title"> TITLE: {{ $post->title}}</h4>
            <img src="{{ url('imgs',$post->image) }}" class="card-img-top img-fluid" width="50px" alt="Card image cap">
            </div>

            <div class="card-body">
                <p class="card-text"> CAPTION: {!! $post->caption !!} </p>
            </div>

            <ul class="list-group" id="postDate">
                <li class="list-group-item">
                    <p> URL: <a href="{{ route('blog.comment', $post->slug )}}"> {{ url($post->slug)}} </a> 
                    </p>
                    <p> Category: {{ $post->category->name }} </a> 
                    </p>
                    <p> post created at: {{ date('M j, Y h:ia', strtotime($post->created_at))}} </p>
                    <p> post updated at: {{ date('M j, Y h:ia', strtotime($post->updated_at))}}</p>
                </li>
             </ul>  

            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Number of comments:{{ $post->comments()->count() }}</h3>
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th width="60px"></th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{!! $comment->comment !!}</td>
                                <td>
                                <a class="btn btn-danger mb-1" href="{{ route('comments.edit', $comment->id) }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger mt-1" href="{{ route('comments.delete', $comment->id) }}"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
            </div>

            <div class="card-footer text-muted">  

                
                <a class="btn btn-danger mx-auto mb-3" id="showButton" href="{{ route('posts.index') }}">
                    blog
                    <i class="fas fa-arrow-right"></i>
                </a> 
                
                <a class="btn btn-danger mx-auto mb-3" id="showButton" href="{{ route('posts.edit', $post->id) }}"> 
                    <i class="far fa-edit"></i>
                    edit
                </a> 

                {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\PostController@destroy', $post->id] ]) !!}

                {{ Form::button('<a class="btn btn-danger py-0 px-0 mx-auto" id="showButton2">
                    <i class="fas fa-trash-alt"></i>
                    delete </a> ', 
                    ['type' => 'submit', 'class' => 'btn btn-danger ml-2'] )  
                }}
                <!-- {!! Form::submit('Delete Post', ['class'=> 'btn btn-danger ml-2']) !!} -->
                {!! Form::close() !!}


            </div>
    </div>

    <br>
    <br>


@endsection