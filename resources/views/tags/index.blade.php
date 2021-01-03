@extends('master_app')

@section('content') 

    <div class="row py-5 mx-3">
        <div class="col-md-8 mt-4" style="color:white; border: solid white 2px;">
          <h1 style="color:white;"  class="mt-2">HASHTAGS</h1>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th> id</th>
                        <th>hashtag</th>
                        <td>name</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <th><a href="{{  route('tags.show', $tag->id)  }}">{{ $tag->name }}</a></th>
                        <td>{{ $tag->name }}</td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4 mt-4  " style="color:white; border: solid white 2px;">
            {!!  Form::open(['route' => 'tags.store', 'method' => 'POST'])  !!}
                <h2 class="mt-2"> Add a new  hashtag</h2>
            {{  Form::label('name', 'Name:')  }}
            {{  Form::text('name', null, ['class' => 'form-control'])  }}
                <br>
                <br>
            {{  Form::submit('create tag', ['class' => 'btn btn-danger btn-block mb-2']) }}
            {!!  Form::close()  !!}
        </div>

    </div>

@endsection