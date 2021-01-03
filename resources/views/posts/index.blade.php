@extends ('master_app')

@section('content')
<div class="container-full-bg mr-3 ml-3 col-md-12 col-lg-12 col-sm-12"  id="indexPage">
	<div class="jumbotron">
		<h2> 
            @if(Auth::check())
            {{ Auth::user()->name }}
            @endif
        </h2>
        <p> YOUR BLOG </p>
        <div class= "d-flex justify-content-center">
            <a href="{{ route('posts.create') }}" type="button" class="btn btn-danger">
            <i class="fas fa-plus"></i>
            New Post 
        </a>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                <div class="card h-100 ">
                    
                    <div class="card-header"> 
                        <h5 class="card-title"> TITLE: {{ $post -> title }}</h5>
                        <img src="{{ url('imgs',$post->image) }}" class="card-img-top img-fluid" width="50px" alt="Card image cap">
                    </div>
                    
                    <div class="card-body">

                        <a class="card-text" href="{{ route('posts.index') }}">
                            <i class="fas fa-user-alt " > </i> 
                            Posted by: 
                            <!-- @if(Auth::check())
                            {{ Auth::user()->name }}
                            @endif -->
                        </a>
                                    
    
                    </div>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item pb-0">              
                            <p> 
                                CAPTION: {{ substr(strip_tags($post -> caption), 0, 5000) }}
                                {{ strlen(strip_tags($post -> caption)) > 50 ? "..." : "" }}  <!-- If more than 50 characters show ... -->
                            </p>
                        </li>

                        <li class="list-group-item pb-0">
                        <p> Category: {{ $post->category->name }} </p> 
                        </li>
                        

                        <li class="list-group-item pb-0">
                        <p class="card-title"> URL: 
                            <a href="{{ route('blog.comment', $post->slug )}}"> {{ url($post->slug)}} </a> 
                        </p>
                        </li>
                        <li class="list-group-item pb-0">
                            <p class="card-text"> post created at: {{ date('M j, Y h:ia', strtotime($post->created_at))}} 
                            </p>
                    </li>
                    </ul>
                    <div class="d-flex card-footer justify-content-center">
                        <a class="btn btn-danger mx-2" href="{{ route('posts.show', $post->id) }}">
                            <i class="fas fa-eye"></i>
                            view 
                        </a> 
                        <a class="btn btn-danger mx-2" href="{{ route('posts.edit', $post->id) }}"> 
                            <i class="far fa-edit"></i>
                            edit
                        </a> 

                    </div>
                </div>
            </div>    
            @endforeach
    </div> 

    {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>

</div>

@endsection