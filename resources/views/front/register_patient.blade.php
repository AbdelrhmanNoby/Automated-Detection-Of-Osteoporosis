@extends('layout')

@section('content')

{{-- @include('errors') --}}
    <div class="wrapper ">
      <div class="inner mt-5 mb-5">
        <form action="{{route("registerp")}}" method="POST">
          @csrf
          <h3>patient registeration</h3>
          <div class="form-group">
            <input type="text" name="fname" placeholder="First Name" class="form-control" />
            <input type="text" name="lname" placeholder="Last Name" class="form-control" />
          </div>
        <div class="form-group justify-content-around">
            @error('fname')
              <div> {{$message}}</div> 
            @enderror
            @error('lname')
                {{$message}}
            @enderror
        </div>

          <div class="form-wrapper">
            <input
              type="text"
              placeholder="phone number"
              class="form-control"
              name="phone"
            />
          </div>
        <div class="form-group justify-content-around">
            @error('phone')
              <div> {{$message}}</div> 
            @enderror
        </div>

          <div class="form-wrapper">
            <input
              type="text"
              placeholder="Email Address"
              class="form-control"
              name="email"
            />
          </div>
        <div class="form-group justify-content-around">
            @error('email')
              <div> {{$message}}</div> 
            @enderror
        </div>

          <div class="form-wrapper">
            <input type="text" name="age" placeholder="Your Age" class="form-control" />
          </div>
         <div class="form-group justify-content-around">
            @error('age')
              <div> {{$message}}</div> 
            @enderror
        </div>

          <div class="form-wrapper">
            <select name="gender" id="" class="form-control">
              <option value="" disabled selected>Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        <div class="form-group justify-content-around">
            @error('gender')
              <div> {{$message}}</div> 
            @enderror
        </div>
          <div class="form-wrapper">
            <input
              type="password"
              placeholder="Password"
              class="form-control"
              name="password"
            />
          </div>
        <div class="form-group justify-content-around">
            @error('password')
              <div> {{$message}}</div> 
            @enderror
        </div>
          <div class="form-wrapper">
            <input
              type="password"
              placeholder="Confirm Password"
              class="form-control"
              name="password_confirmation"
            />
          </div>
        <div class="form-group justify-content-around">
            @error('password')
              <div> {{$message}}</div> 
            @enderror
        </div>
            
          <div class="form-wrapper">
            <select name="user_id" id="" class="form-control">
              <option value="" disabled selected>Doctor Name</option>
               @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->fname." ".$user->lname}}</option>
                @endforeach
              
            </select>
          </div>
          <button type="submit" name="submit">sign up now</button>
        </form>
      </div>
    </div>

@endsection

@section('title')
   Patient Register
@endsection
@section('style')
      <link href="{{asset('assets/css')}}/register_patient_style.css" rel="stylesheet">
@endsection