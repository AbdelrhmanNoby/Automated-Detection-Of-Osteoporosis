<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
route 
controller
function 
method get - post 
name 

mvc -- model , view , controller



*/
Route::get("/",[FrontController::class,"home"])->name("homePage");
// register of doctor
Route::get("/register_doctor",[AuthController::class,"registerDoctor"])->name("registerDoctor");
Route::post("/registerd",[AuthController::class,"registerd"])->name("registerd");
// register of patient
Route::get("/register_patient",[AuthController::class,"registerPatient"])->name("registerPatient");
Route::post("/registerp",[AuthController::class,"registerp"])->name("registerp");

// login of doctor
Route::get("/login_doctor",[AuthController::class,"loginDoctor"])->name("loginDoctor");
Route::post("/logind",[AuthController::class,"logind"])->name("logind");
// login of patient
Route::get("/login_patient",[AuthController::class,"loginPatient"])->name("loginPatient");
Route::post("/loginp",[AuthController::class,"loginp"])->name("loginp");

//logout
Route::post("/logout",[AuthController::class,"logout"])->name("logout");


Route::middleware("is_doc","auth")->group(function(){

Route::get("/dignosis",[ReportController::class,"dignosis"])->name("dignosisPage");
//model phases
Route::get("/model_form/{patient_id}",[ModelController::class,"model_form"])->name("modelForm");
Route::post("/predection/{patient_id}",[ModelController::class,"predection"])->name("predection");
Route::post("/store-report/{report_id}",[ModelController::class,"storeReport"])->name("storeReport");
//  edit report
Route::get("/edit-report/{id}",[ReportController::class,"edit"])->name("editReport");
// Route::post("/store-report",[ReportController::class,"storeReport"])->name("storeReport");

// add- patient 
Route::get("/add-patient",[ReportController::class,"patientForm"])->name("PatientForm");
Route::post("/add-patient",[ReportController::class,"storePatient"])->name("storePatient");

});

Route::middleware("is_pat","auth:patient")->group(function(){
Route::get("/clinical",[FrontController::class,"clinical"])->name("clinicalPage");
// Route::post("/logoutPatient",[AuthController::class,"logout"])->name("logoutPatient");

});




