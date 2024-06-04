@extends('layout')

@section('content')
@foreach ($reports as $report)
    <section class="clinical">
        <div class="cotainer">
            <div class="row"> 
                <div class="col-lg-12 mt-4"> 
                    <div class="dr-item d-flex align-items-start " >
                   
                    <div class="pic" class="col-md-4 " >  
                        <div class="info">
                            <h3 style="color: #0a5b7f;">Dr.{{$report->user->fname." ".$report->user->lname}}</h3> 
                            <p  style="color: #0a5b7f;">{{$report->user->email}}</p> 
                        </div>
                        <div class="date">
                            <h4 style="color: #0a5b7f;">{{$report->report_date}}</h4>
                        </div> <br> 
                        <div class="sign" >
                            <h4 style="color: #0a5b7f;  font-weight: 300;  font-size: 1.5em ;" > 
                                 Signature</h4>
                            <h5>{{$report->user->fname." ".$report->user->lname}}</h5>
                        </div> 
                    </div>
                   
                    <div class="diagnose"  class="col-md-4">
                        <h3 style="color: #0a5b7f;   font-weight: 500;  font-size: 2em ; " >
                             Diagnosis </h3>
                        <h5>{{$report->diagnosis}}</h5> 
                        <img src="/images/{{$report->image}}" width="300px" height="300px" />
                    </div>

                    <div class="report" class="col-md-4"> 
                        <h3 style="color: #0a5b7f;   font-weight: 500;  font-size: 2em ; " >Doctor Report</h3>
                        <div class="paragraph">
                        <p> {{$report->report}}</p>
                    </div>
                         
                    </div> 
                 </div>
                    </div>
                    </div>
                </div>


    </section>
@endforeach
       
@endsection

@section('title')
    Clinical Page
@endsection

@section('style')
      <link href="{{asset('assets/css')}}/report_card_style.css" rel="stylesheet">
@endsection