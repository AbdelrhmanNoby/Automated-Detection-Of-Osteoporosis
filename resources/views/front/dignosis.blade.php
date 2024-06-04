@extends('layout')

@section('content')
    

    {{-- <div class="container mt-5">
    <h3 class="mb-3">All Patients </h3>
    {{-- <a href="{{route("PatientForm")}}" class="btn btn-success mb-3">Add New Patient</a> --}}
    {{-- <a href="{{route("modelForm")}}" class="btn btn-success mb-3">Add New Report</a> --}}
{{-- <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Your Are Register Success And This Is Your Private Key To Register : {{$key}}
  </div>
</div> --}}
{{-- {{$token}} --}}
{{-- @foreach ($data as $da)
    {{$da->users->token}}
@endforeach --}}
{{-- <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Report Name</th>
        <th scope="col">Patient First Name</th>
        <th scope="col">Patient Last Name</th>
        <th scope="col">Dignosis</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$report->report_name}}</td>
            <td>{{$report->patient->fname}}</td>
            <td>{{$report->patient->lname}}</td>
            <td>{{$report->diagnosis}} </td>
            <td>
                <a href="{{route("editReport",$report->id)}}" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
                <a href="#" class="btn btn-info">Show Report</a>
            </td>
          </tr>
        @endforeach
      
    </tbody>
  </table> --}}
  {{-- @foreach ($user as $us)
      {{$us->token}}
  @endforeach --}}
   {{-- @if ($patients)
       @foreach ($patients as $patient)
      {{$patient->fname}}
      <a href="{{route("modelForm",["patient_id"=>$patient->id])}}"><button class="btn btn-primary">Add Report</button></a>
      {{$patient->user->token}}
     @endforeach

   @else
     <h2>No Patient</h2>  
   @endif --}}
    



{{-- </div> --}} 


     <div  class="container-fluid h-100 card" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="badge ">
                            <div class="custom-range"></div>

                      {{-- <a href="#">
                      @foreach ($users as $user)
                      {{$user->id}}
                        {{$user->token}}
                  @endforeach
                            </a> --}}


                <div class="custom-select">
           
            <ul class="us2">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle us" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @foreach ($users as $user)
                      {{-- {{$user->id}} --}}
                        {{$user->fname." ".$user->lname}}
                   
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Title: {{$user->title}}  </a></li>
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
            
            </div>
            

            <div class="row py-5 mt-3">
               <div class="alert alert-primary mt-5" role="alert">
                        @foreach ($users as $user)
                          <h4>Welcome Dr.{{$user->fname}} Your Token is: {{$user->token}} Please remember it.</h4>
                          @endforeach
               </div>
      @foreach ($patients as $patient)
          <div class="col-md-4">
            
                <div class="profile-card">
                      <div class="text-data"> 
                      <span class="name">{{$patient->fname." ".$patient->lname}}</span> 
                      </div>
                      <div class="buttons">
                        <a href="{{route("modelForm",["patient_id"=>$patient->id])}}"> <button> Add Report</button> </a>
                      </div>
                      <ul>
                          <li><i class="fa-solid fa-phone" style="color: blue;"></i>{{$patient->phone}}</li>
                          <li> <i class="fa-regular fa-envelope"  style="color: green;"></i>{{$patient->email}}</li>
                          <li><i class="fa-solid fa-pager" style="color: black;"></i>{{$patient->age}}</li>
                          <li><i class="fa-solid fa-person-half-dress" style="color: #0a5b7f;"></i>{{$patient->gender}}</li>
                        
                      </ul>

                  </div>

          </div>
      @endforeach
            </div>
        
               
                
        </div>
        </div>



@endsection

@section('title')
    Dignosis Page
@endsection

@section('style')
    {{-- <link rel="{{asset('assets/css')}}/login_doctor_style.css" href="style.css"> --}}
      <link href="{{asset('assets/css')}}/model_form_two_style.css" rel="stylesheet">
      <link href="{{asset('assets/css')}}/patient_card_style.css" rel="stylesheet">
@endsection