<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{


    //----------------
     public function dignosis(){
        $data['patients'] = Patient::where("user_id",Auth::user()->id)->get();
        $data['users']= User::where("id",Auth::guard("web")->user()->id)->get();
        return view("front.dignosis")->with($data);
    }



}
