@extends ('master_app')

@section('content')
<section class="container-fluid px-3 py-5" id="createPost">
        <div class="post align-items-center">
            <div class="firstEntry col-lg-8">
        
        <!-- form with text field input groups -->
        {!! Form::open(['route' => 'posts.store', 'method' => 'post', 'files' => true,
         'data-parsley-validate' => '']) !!}   
        
        <div class="form-group" id="formText" >
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', null, array('class' => 'form-control',
                    'required'=>'','minlength'=>'2', 'maxLength' => '100', 'placeholder' => 'enter a title')) }}
        </div>

        <div class="form-group" id="formText">
            {{ Form::label('slug', 'URL: ') }}
            {{ Form::text('slug', null, array('class' => 
                'form-control','required'=>'', 'maxLength' => '250','placeholder' => 'enter a url')) }}
        </div>

        <div class="form-group" id="formText">
            {{ Form::label('category_id', 'Category: ') }}

            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value='{{ $category->id }}'>
                    {{ $category->name}}
                </option>
                @endforeach
            </select> 
        </div>

        <div class="form-group" id="formText">
            {{ Form::label('tags', 'Tags: ') }}

            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>
                    {{ $tag->name}}
                </option>
                @endforeach
            </select> 
        </div>

        <div class="form-group" id="formText">
        {{ Form::label('image', 'Upload an Image: ') }}
            <div>
                
            {{ Form::file('image', ['class' => 'btn btn-danger']) }}
            </div>
        </div>
 

        <div class="form-group" id="formText">
                    {{ Form::label('caption', 'Post Caption:') }}
                    {{ Form::textarea('caption', null, array('class' =>
                    'form-control','required'=>'','minlength'=>'2',  'maxLength' => '250', 'placeholder' => 'write a caption...')) }}
        </div>

        {{ Form::submit('Create new Post', array('class' => 'btn btn-danger btn-block', 'style' => 
            'margin-top: 20px; background-color: #EA1C2C; border: none;')) 
        }}

        {!! Form::close() !!}

    </div>
</section>

@endsection

