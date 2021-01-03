@extends('master_app')

@section('content') 

  <section id="contact" class="py-5 mt-4">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <div class="card p-4">
            <div class="card-body">
              <h4>Get in touch with us</h4>
              <p> Reach out to us by using the form, sending us an email, or via the phone number given below!</p>
              <h4>Address</h4>
              <p>Swansea University</p>
              <h4>Email</h4>
              <p>srushtivasani@gmail.com</p>
              <h4>Phone</h4>
              <p>(+44)123456789</p>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <h2 class="text-center" style="color:white;">Please fill out this form to contact us</h2>
          <hr>
            <div class="row">
              <div class="col-md-12">
                <form action="{{  url('contact') }}" method="POST" >
                  @csrf
                    <div class="form-group">
                      <input id="email" name="email" class="from-control" style="width:100%" placeholder="Email">
                    </div> 

                    <div class="form-group">              
                      <input id="subject" name="subject" style="width:100%" class="from-control" placeholder="Subject">
                    </div>

                    <div class="form-group">                   
                      <textarea id="message" name="message" style="width:100%" class="from-control" placeholder="Message"></textarea>
                    </div>

                    <br>       

                    <div class="form-group">
                      <input type="submit" value="Submit" class="btn btn-outline-danger btn-block">
                    </div>   

                </form>
              </div>
            </div>          
        </div>
      </div>
    </div>
  </section>

@endsection