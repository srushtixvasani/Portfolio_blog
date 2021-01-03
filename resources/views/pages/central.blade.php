@extends ('master_app')

@section('content')
<div class="container-full-bg mr-3 ml-3 col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="indexPage">
	<div class="jumbotron">
		<h2> PORTFOLIO </h2>
        <!-- <p> your posts</p> -->
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

                        <!-- edited -->
                        <a class="card-text" >
                            <i class="fas fa-user-alt " > </i> 
                            Posted by: 
                            @if(Auth::check())
                            {{ Auth::user()->name }}
                            @endif
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
                            <p class="card-title"> url: 
                                <a href="{{ route('blog.comment', $post->slug )}}"> {{ url($post->slug)}} </a> 
                            </p>
                            </li>
                            <li class="list-group-item pb-0">
                                <p class="card-text"> posted at : {{ date('M j, Y h:ia', strtotime($post->created_at))}} 
                                </p>
                            </li>
                            <li class="list-group-item pb-0">
                                <p class="card-text"> updated at : {{ date('M j, Y h:ia', strtotime($post->updated_at))}} 
                                </p>
                            </li>
                    </ul>

                    <div class="d-flex card-footer justify-content-center">
                        <a class="btn btn-danger ml-2" href="{{ url('blog/'.$post->slug) }}">
                            <i class="fas fa-eye"></i>
                            Read more
                        </a> 
                    </div>

                
                </div>
            </div>    
            @endforeach
    </div> 

</div>

@endsection