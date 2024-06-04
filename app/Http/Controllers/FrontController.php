<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home(){
        return view("home");
    }
    
    public function clinical(){
        $data['reports']= Report::where("patient_id",Auth::user()->id)->get();
        return view("front.clinical")->with($data);
    }
}



