<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ModelController extends Controller
{
     public function model_form($patient_id){
        $data['patient'] = Patient::findOrFail($patient_id);
        $data['users']= User::where("id",Auth::guard("web")->user()->id)->get();
        return view('report.create-report-model')->with($data);
    }

     public function predection($patient_id,Request $request)
    {
    if ($request->file('file')) {
        # code...
    
     // Handle image upload
     $image = $request->file('file');
     $imageName = time().'.'.$image->extension();
    $imagePath = $image->storeAs('public/images', $imageName);

    // Associate the image path with the report in the database
    $report = Report::create([
        "image" => $imageName,
        "user_id" => Auth::user()->id,
        "patient_id" => $patient_id,
        // You can add more fields to the report here
    ]);
        $image->move(public_path('images'), $imageName);
        
        // Send image to Flask app
        $response = Http::attach(
            'file', file_get_contents(public_path('images/'.$imageName)), $imageName
        )->post('http://127.0.0.1:5000/process-image');

        // Get result from Flask app
        $result = $response->json();
        // get patient
        $data['patient'] = Patient::findOrFail($patient_id);
        $data['users']= User::where("id",Auth::guard("web")->user()->id)->get();
        $data['report'] = $report;
         return view('report.create-report-model-two',["result"=> $result])->with($data);

}else{
    $data['errors'] = "Please Select X-ray";
    $data['patient'] = Patient::findOrFail($patient_id);
    $data['users']= User::where("id",Auth::guard("web")->user()->id)->get();
    return view('report.create-report-model')->with($data);
}

    }


   public function storeReport($report_id,Request $request){
    // dd($request);
        $data = $request->validate([
            "report_name"=>"required|string",
            "diagnosis"=>"required|string",
            "report"=>"required|string",
        ]);

        $report=Report::findOrFail($report_id);
        $report->update($data);
        return redirect()->route("dignosisPage");
    }
}
