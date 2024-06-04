<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    //register doctor
     public function registerDoctor(){
        return view("front.register_doctor");
    }
    public function registerd(Request $request){
        $data = $request->validate([
            "fname"=>"required|string|max:20",
            "lname"=>"required|string|max:20",
            "email"=>"required|email|max:100|unique:users,email",
            "age"=>"required|numeric|min:25",
            "gender"=> ['required', 'string', Rule::in(['male', 'female'])],
            "phone"=>"required|numeric",
            "password"=>"required|string|min:6|confirmed",
            "title"=> ['required', 'string', Rule::in(['Inter Doctor', 'Resident Doctor','Specialist Doctor','Senior Specialist Doctor','Consultant Doctor','Senior Consultant Doctor','Professor Doctor'])],
            "practice_number"=>"required|numeric",
            "token"=>"numeric",
        ]);

        $data["password"] =  bcrypt($data["password"]);
        $key = random_int(0, 999999);
        $key = str_pad($key, 7, 0, STR_PAD_LEFT);
        $data["token"] =  $key;
        $user=User::create($data);
        Auth::login($user);
        $data['patients']= Patient::where("user_id",Auth::user()->id);
        $data['users']= User::where("id",Auth::guard("web")->user()->id);
        // return view("front.dignosis")->with($data);
        return redirect()->route('dignosisPage',compact('data'));

    }
    // login doctor
   public function loginDoctor(){
        return view("front.login_doctor");
    }

    public function logind(Request $request){

        $data = $request->validate([
            "token"=>"required|numeric",
            "password"=>"required|string",
        ]);

        $doctor=Auth::guard("web")->attempt(['token'=>$data['token'],'password'=>$data['password']]);
        if ($doctor) {
        $data['users']= User::where("id",Auth::guard("web")->user()->id)->get();

            return redirect()->route("dignosisPage");
            // return view("front.dignosis");
        }else
        {
            return redirect()->route("loginDoctor")->withErrors("credintails not correct");   
        }

    }

    // register patient
    public function registerPatient(){
        $data['users'] = User::all();
        return view("front.register_patient")->with($data);
    }


    public function registerp(Request $request){
        $data = $request->validate([
            "fname"=>"required|string|max:20",
            "lname"=>"required|string|max:20",
            "email"=>"required|email|max:100|unique:patients,email",
            "age"=>"required|numeric",
            "gender"=> ['required', 'string', Rule::in(['male', 'female'])],
            "phone"=>"required|numeric",
            "password"=>"required|string|min:6|confirmed",
        ]);

        $data["password"] =  bcrypt($data["password"]);
        $data["user_id"] = $request->user_id;
        $user=Patient::create($data);

        return redirect()->route("homePage");

    }

    // login patient 

   public function loginPatient(){
        return view("front.login_patient");
    }

    public function loginp(Request $request){

        $data = $request->validate([
            "email"=>"required|string",
            "password"=>"required|string",
        ]);

        $patient=Auth::guard("patient")->attempt(['email'=>$data['email'],'password'=>$data['password']]);
        if ($patient) {
            return redirect()->route("clinicalPage");
        }else
        {
            return redirect()->route("loginPatient")->withErrors("credintails not correct");   
        }

    }

    // logout

        public function logout(){

        if(!Auth::user())
        {
            Auth::guard("patient")->logout();
        }
        else
        {
            Auth::logout();
        }
        return redirect()->route("homePage");
    }




    
}
