@extends('master_app')

@section('content') 
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{  url('contact') }}" method="POST" >
          @csrf
            <div class="form-group">
              <label name="email">Email:
              </label>
              <input id="email" name="email" class="from-control">
            </div>
  
            <div class="form-group">
              <label name="subject">Subject:
              </label>
              <input id="subject" name="subject" class="from-control">
            </div>

            <div class="form-group">
              <label name="subject">Message:</label>
              <textarea id="message" name="message" class="from-control"></textarea>
            </div>
            
            <input type="submit" value="Send Message" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
@endsection
