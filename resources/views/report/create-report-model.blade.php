@extends('layout')

@section('content')


     <div class="container-fluid card ">
        <div class="row">
            <div class="card-header">
                <div class="badge">
                    <div class="custom-range"></div>

                    <div class="custom-select">
          <ul>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle us" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       @foreach ($users as $user)
                      
                        {{$user->fname." ".$user->lname}}
               </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">title:  {{$user->title}}</a></li>
                <li><a class="dropdown-item" href="#">Age: {{$user->age}} </a></li>
                    <li><a class="dropdown-item" href="#">Gender: {{$user->gender}} </a></li>
              </ul>
           </li>
           @endforeach 
        </ul>
                    </div>
                </div>
            </div>
          </div> 
      <!--................................................................... -->

      <div class="limiter row container-login100 container-fluid  p-5">
  
    
      <div class="row justify-content-center wrap-login100 mt-5 ">
      <div class="col-md-6">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{asset("im/broken-bone_7135347.png")}}" alt="IMG">
        </div>
  
      </div>

      <div class="col-md-6 ">
      <form action="{{route("predection",["patient_id"=>$patient->id])}}" method="POST" class="php-email-form" enctype="multipart/form-data">
		      @csrf
          <div class="alert alert-danger">   {{$errors}}</div>
            <h3 class="">
            upload your x-ray
           </h3>
              <input type="file" name="file" class="form-control datepicker" id="date" >
              <div class="validate"></div>
          <div class="text-center"><button class="btn btn-primary" type="submit" name="submit">Detection</button></div>
        </form>

          </div>


    </div>
    
 
    </div>

                       
  </div> 


@endsection

@section('title')
    Detection Page
@endsection

@section('style')
    {{-- <link rel="{{asset('assets/css')}}/login_doctor_style.css" href="style.css"> --}}
      <link href="{{asset('assets/css')}}/model_form_one_style.css" rel="stylesheet">
@endsection