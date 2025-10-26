<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionProcessingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/event','EventCalender@index');

Route::get('/','FrontendController@index');


Route::get('/new-appointment/{doctorId}/{date}','FrontendController@show')->name('create.appointment');



Route::group(['middleware'=>['auth','patient']],function(){

	Route::post('/book/appointment','FrontendController@store')->name('booking.appointment');

	Route::get('/my-booking','FrontendController@myBookings')->name('my.booking');

	Route::get('/user-profile','ProfileController@index');
	Route::post('/user-profile','ProfileController@store')->name('profile.store');
	Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');
	Route::get('/my-prescription','FrontendController@myPrescription')->name('my.prescription');


});


Route::get('/dashboard','DashboardController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware'=>['auth','pharmacy']],function(){

	Route::resource('medicines', MedicineController::class);
	Route::get('prescription-process',[PrescriptionProcessingController::class,'index'])->name('prescription.process.index');
	Route::post('prescriptions-change-status',[PrescriptionProcessingController::class,'changePrescriptionStatus'])->name('prescriptions.change-status');
	Route::post('prescriptions-send',[PrescriptionProcessingController::class,'sendToDelevery'])->name('prescriptions.send');

	Route::get('prescription-delivery',[PrescriptionProcessingController::class,'deliveryPrescription'])->name('prescription.deliveryPrescription');
	Route::get('prescription-recieved',[PrescriptionProcessingController::class,'recievedPrescription'])->name('prescription.recievedPrescription');

});

Route::get('lang/{lang}', [ProfileController::class, 'switchLang'])->name('lang.switch');




