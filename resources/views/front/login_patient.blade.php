@extends('layout')
@section('content')


    <div class="wrapper">
      <div class="inner">
        <form action="{{route("loginp")}}" method="POST">
          @csrf
          <h3>sign in</h3>

          <div class="form-wrapper">
            <input
              type="text"
              name="email"
              placeholder="Email Address"
              class="form-control"
            />
          </div>
        <div class="form-group justify-content-around">
            @error('email')
              <div> {{$message}}</div> 
            @enderror
        </div>


          <div class="form-wrapper">
            <input
              type="password"
              name="password"
              placeholder="Password"
              class="form-control"
            />
          </div>
        <div class="form-group justify-content-around">
            @error('password')
              <div> {{$message}}</div> 
            @enderror
        </div>
          <button type="submit" name="submit">sign in now</button>
        </form>
      </div>
    </div>

	
@endsection

@section('title')
    Patient Login
@endsection

@section('style')
      <link href="{{asset('assets/css')}}/login_patient_style.css" rel="stylesheet">
@endsection