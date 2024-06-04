@extends('layout')

@section('content')

   


     <div  class="container-fluid h-100 card" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="badge ">
                            <div class="custom-range"></div>

                            <div class="custom-select">
                                   <!-- <h1 class="username">Mohamed</h1>
                                   
                                   <select name="" id="" class="form-control">
                                   <option value="" disabled selected>Your Title</option>
                                   
                                 </select>
                                    
                                
                                <small class="modal-title">doctor</small> -->
        <ul class="us2">
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
            
            </div>
            <div class="row py-5">
                <div class="col-md-4">
                    <div class="w-100 py-5 mt-5">
                        <img src="/images/{{$report->image}}" height="400" alt="">
                    </div>
                </div>
            {{-- <div class="row py-5"> --}}
                <div class="col-md-6">

                <form action="{{route("storeReport",["report_id"=>$report->id])}}" method="POST">
                  @csrf
                    <div class="py-5">
                        <div class="text-center">
                            <input type="text" name="report_name" placeholder="Report Name">
                         </div>
                        <div class="text-center">
                         @foreach ($result as $res) 

                         <input type="text" placeholder="Diagnosis" name="diagnosis" value="{{$res}}">

                          @endforeach
                         </div>
                
                         <div class="inner">
                             <h3>Doctor Report</h2>
                             <textarea class="textarea" name="report"  placeholder="write your report..."></textarea>
                             {{-- <input class="btn btn-primary" type="submit" name="" value="Submit"> --}}
                             <button class="btn btn-primary mt-3" type="submit" name="submit" >Submit Report</button>
                         </div>
                
                    </div>
                </div>
                </form>
            </div>
        
               
                
        </div>
        </div>

@endsection

@section('title')
    Report Page
@endsection

@section('style')
    {{-- <link rel="{{asset('assets/css')}}/login_doctor_style.css" href="style.css"> --}}
      <link href="{{asset('assets/css')}}/model_form_two_style.css" rel="stylesheet">
@endsection