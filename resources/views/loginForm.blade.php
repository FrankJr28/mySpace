@extends('layouts.template')

@section('title', 'Login')

@section('content')

<div class="container">
  <div class="row d-flex justify-content-center mt-3">
    <div class="col-sm-12 col-lg-6 bg-white border border-gray p-3" style="border-radius:20px;">  
      <h3 class="text-dark">Login Form</h3>
      <form action="{{route('user.create')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$data["email"]}}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$data["givenName"]}}">
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Lastname</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="lastname" value="{{$data["familyName"]}}">
            </div>
          <div class="mb-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div class="mb-3">
  </div>
</div>

@endsection