@extends('layout')

@section('content')

    {{-- <section id="appointment" class="appointment section-bg mt-5 ">
      <div class="container">
    @include('errors')
        <div class="section-title">
          <h2>Create Doctor Account</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form action="{{route("registerd")}}" method="POST" class="php-email-form" >
			    @csrf
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="fname" class="form-control" id="name" placeholder="First Name" >
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" name="lname" class="form-control" id="name" placeholder="Last Name" >
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" >
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="age" id="email" placeholder="Your Age">
              <div class="validate"></div>
            </div>
			<div class="col-md-4 form-group ">
              <select name="gender" id="department" class="form-select">
                <option value="">Your Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" >
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="password" name="password" class="form-control datepicker" id="date" placeholder="Password" >
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="password" name="password_confirmation" class="form-control datepicker" id="date" placeholder="Re Password" >
              <div class="validate"></div>
            </div>
			  <div class="col-md-4 form-group ">
              <select name="title" id="department" class="form-select">
                <option value="">Your Job Title</option>
                <option value="advisor">Advisor</option>
                <option value="specialist">Specialist</option>
                <option value="professor">Professor</option>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <input type="text" name="practice_number" class="form-control datepicker" id="date" placeholder="practice_number" >
              <div class="validate"></div>
            </div>
            </div>

          </div>

          <div class="text-center"><button type="submit" class="btn btn-primary" name="submit">Register</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section --> --}}

    <div class="wrapper">
      <div class="inner mt-5 mb-5">
        <form action="{{route("registerd")}}" method="POST">
          @csrf
          <h3>doctor registeration</h3>
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


          <div class="form-group">
            <input type="text" name="phone" placeholder="phone number" class="form-control"/>
            <input type="text" name="age" placeholder="Your Age" class="form-control" />
          </div>
          <div class="form-group justify-content-around">
            @error('phone')
              <div> {{$message}}</div> 
            @enderror
               @error('age')
                {{$message}}
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
                {{$message}}
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
                {{$message}}
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
                {{$message}}
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
                {{$message}}
            @enderror
          </div>

          <div class="form-wrapper">
            <input
              type="text"
              placeholder="Occupational license number"
              class="form-control"
              name="practice_number"
            />
          </div>
          <div class="form-group justify-content-around">
               @error('practice_number')
                {{$message}}
            @enderror
          </div>

          <div class="form-wrapper"> 
            <select name="title" id="" class="form-control">
              <option value="" disabled selected>Title</option>
              <option value="Inter Doctor">Intern Doctor</option>
              <option value="Resident Doctor" >Resident Doctor</option>
              <option value="Specialist Doctor" >Specialist Doctor</option>
              <option value="Senior Specialist Doctor" >Senior Specialist Doctor</option>
              <option value="Consultant Doctor">Consultant Doctor</option>
              <option value="Senior Consultant Doctor">Senior Consultant Doctor</option>
              <option value="Professor Doctor">Professor Doctor</option>
            </select>
          </div>
          <div class="form-group justify-content-around">
               @error('title')
                {{$message}}
            @enderror
          </div>

          <button type="submit" name="submit">sign up now</button>
        </form>
      </div>
    </div>

@endsection

@section('title')
   Doctor Register
@endsection

@section('style')
      <link href="{{asset('assets/css')}}/register_doctor_style.css" rel="stylesheet">
@endsection