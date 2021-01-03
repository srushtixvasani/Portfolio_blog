@extends(master_app)

@section('content')

<div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 col-sm-6 col-xs-12 mb-4">
                <div class="card h-100 ">
                    <div class="card-header"> 
                        <h5 class="card-title">{{ $post -> title }}</h5>
                    </div>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">            
                        <p class="card-text"> 
                            {{ substr($post->caption, 0, 50) }}
                            {{ strlen($post->caption) > 50 ? '...' : "" }}
                        </p>

                        <p class="card-text"> 
                            published at: {{ date('M j, Y', strtotime($post->created_at)) }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-danger ml-2" href="{{ route('blgo.comment', $post->slug) }}">
                            <i class="fas fa-eye"></i>
                            read more
                        </a> 
                    </div>
                </div>
            </div>    
            @endforeach

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
</div> 

@endsection