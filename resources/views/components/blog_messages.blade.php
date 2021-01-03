<!-- // if blog is successfully created, a message will be displayed -->

@if (Session::has('successaction'))

<div class="row">
    <div class="alert alert-light mt-5 mx-auto"  role="alert" >
        <strong> Congratulations: </strong> 
        {{ Session::get('successaction') }}
    </div>
</div>
@endif

@if (count($errors) > 0)

    <div class="row">
        <div class="alert alert-danger mt-5 mx-auto" role="alert">
            <strong> Sorry, there seems to be some problems: </strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>    

@endif

