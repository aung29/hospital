
<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SignupController;


use Illuminate\Support\Facades\App;
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
Route::get('dashboard',[DashboardController::class,'roomTable']); 

Route::get('/download1',[DownloadController::class,'roomStatusDownload']);
Route::get('/download2',[DownloadController::class,'messageDownload']);
Route::get('/download3',[DownloadController::class,'drugDownload']);
Route::get('/download4',[DownloadController::class,'appointmentDownload']);
    



   Route::get('/roomview', function () {
    return redirect('room');
   });

  
    
    

Route::resource('room', RoomController::class);
Route::resource('message', MessageController::class);
Route::resource('drug', DrugController::class);
Route::resource('appointment', AppointmentController::class);
Route::resource('doctor', DoctorController::class);

Route::post('dashboard',[LoginController::class,'login']);
    

Route::get('roomtable',[DashboardController::class,'tableOne']);

 

// Route::get('login',function() {
//       return View('login.login');
// });
Route::get('login',function(){
      return View('login.login',["error"=>0]);
});
Route::get('signup', function() {
      return View('login.signup',['error' => 4]);
});

Route::post('signup',[SignupController::class,'signup']); 


Route::get('logout',[LoginController::class,'logout']);

Route::get('account',[SignupController::class,'compareName']);



Route::get('/dashboard/{locale}', function ($locale) {

      session(['lang'=>$locale]);
  return redirect('dashboard');
});

Route::get('/verify/{token}', function ($token) {
      if(session()->has('user')){
            session()->pull('user');
        }
      session(['token'=>$token]);
      return redirect('login');
});

