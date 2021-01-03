@extends('master_app')

  @section('content') 

    <div class="row py-5 mx-3">

        <div class="col-md-8 mt-3">
          <h1 style="color:white;" >CATEGORIES</h1>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3 mt-4" style="color:white;">
            {!!  Form::open(['route' => 'categories.store', 'method' => 'POST'])  !!}
                <h2>New Category</h2>
            {{  Form::label('name', 'Name of category:')  }}
            {{  Form::text('name', null, ['class' => 'form-control'])  }}
                <br>
                <br>
            {{  Form::submit('Add Category', ['class' => 'btn btn-danger btn-block']) }}
            {!!  Form::close()  !!}
        </div>
    </div>

@endsection