@extends ('master_app')

@section('content')
<section class="container-fluid px-3 py-5" id="createPost">
    
        <div class="post align-items-center">
            <div class="firstEntry col-lg-8">
        
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT' ]) !!}

        
        <div class="form-group" id="formText" >
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', null, array('class' => 'form-control',
                    'required'=>'','minlength'=>'2', 'maxLength' => '100')) }}
        </div>
        
        <div class="form-group" id="formText">
            {{ Form::label('slug', 'Slug: ') }}
            {{ Form::text('slug', null, array('class' => 
                'form-control','required'=>'', 'maxLength' => '250')) }}
        </div>

        <div class="form-group" id="formText">
            {{ Form::label('category_id', 'Category: ') }}
            {{ Form::select('category_id', $showcat, null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group" id="formText">
            {{ Form::label('tags', 'Hashtags: ') }}
            {{ Form::select('tags[]', $showtags, null, ['class' => 'form-control select2-multi',
                 'multiple' => 'multiple']) }}
        </div>

        <div class="form-group" id="formText">
                    {{ Form::label('caption', 'Post Caption:') }}
                    {{ Form::textarea('caption', null, array('class' =>
                    'form-control','required'=>'','minlength'=>'2',  'maxLength' => '250')) }}
        </div>

        <ul class="list-group" id="postDate">
                <li class="list-group-item">
                      <p> post created at: {{ date('M j, Y h:ia', strtotime($post->created_at))}} </p>
                      <p> post updated at: {{ date('M j, Y h:ia', strtotime($post->updated_at))}}</p>
                </li>
             </ul>  

        <a href="{{route('posts.index')}}" class="btn btn-primary btn-block" id="editButton">
        
            back
        </a> 


        {{ Form::submit('update', array('class' => 'btn btn-primary btn-block mt-2', 'style' => 
            'margin-top: 20px; background-color: #EA1C2C; border: none;')) 
        }}

        {!! Form::close() !!}

    </div>
</section>

@endsection
