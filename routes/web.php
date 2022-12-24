<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/animals', function () {
    return view('animal.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'doctor','as' => 'doctors.'], function (){
    Route::get('login' , [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login' , [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'submitLoginForm'])->name('submitLoginForm');
    Route::get('register' , [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('register' , [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'submitRegisterForm'])->name('submitRegisterForm');
    Route::post('logout' , [\App\Http\Controllers\Doctor\Auth\AuthenticateDoctorController::class, 'logout'])->name('logout');
});
Route::group(['prefix' => 'secretary','as' => 'secretary.'], function (){
    Route::get('login' , [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login' , [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'submitLoginForm'])->name('submitLoginForm');
    Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function (){
        Route::get('/clinic', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'clinic'])->name('doctor-clinic');
        Route::get('/home', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'home'])->name('doctor-home');
        Route::get('/pending', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'pending'])->name('pending');
        Route::put('/pending/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'change_appointment_status'])->name('change-status');
        Route::put('/report/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'write_report'])->name('write-report');
        Route::delete('/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'destroyAppointment'])->name('doctor-delete');
//        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
//        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });
});
Route::group(['prefix' => 'dashboard','as' => 'dashboard.doctor.','middleware'=> ['auth:doctor',\App\Http\Middleware\IsDoctorHasCertifications::class]],function (){
//    Route::get('/',[\App\Http\Controllers\Doctor\Dashboard\HomeController::class, 'index'])->name('home');
    Route::get('/reports',[\App\Http\Controllers\Doctor\Dashboard\ReportsController::class, 'index'])->name('reports');
    Route::group(['prefix' => 'profile' , 'as' => 'profile.'],function (){
        Route::get('/profile',[\App\Http\Controllers\Doctor\Auth\ProfileController::class, 'index'])->name('profile');
        Route::put('/profile',[\App\Http\Controllers\Doctor\Auth\ProfileController::class, 'update'])->name('update');
    });
    Route::group(['as' => 'certificates.'],function (){
        Route::withoutMiddleware([\App\Http\Middleware\IsDoctorHasCertifications::class])
//        ['prefix' => 'certificates','as' => 'dashboard.doctor.']
            ->prefix('certificates')->group(function (){
                Route::get('/',[\App\Http\Controllers\Doctor\Dashboard\DoctorCertificatesController::class,'index'])->name('index');
                Route::post('/',[\App\Http\Controllers\Doctor\Dashboard\DoctorCertificatesController::class,'create'])->name('add');
                Route::delete('/{certificate}',[\App\Http\Controllers\Doctor\Dashboard\DoctorCertificatesController::class,'destroy'])->name('delete');
            });
    });
    Route::group(['prefix' => 'dates','as' => 'dates.'],function (){
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\DoctorDatesController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\DoctorDatesController::class, 'create'])->name('add');
        Route::delete('/{date}', [\App\Http\Controllers\Doctor\Dashboard\DoctorDatesController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function (){
        Route::get('/clinic', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'clinic'])->name('doctor-clinic');
        Route::get('/home', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'home'])->name('doctor-home');
        Route::get('/pending', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'pending'])->name('pending');
        Route::put('/pending/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'change_appointment_status'])->name('change-status');
        Route::put('/report/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'write_report'])->name('write-report');
        Route::delete('/{appointment}', [\App\Http\Controllers\Doctor\Dashboard\AppointmentsController::class, 'destroy'])->name('doctor-delete');
//        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
//        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });
    Route::group(['prefix' => 'secretary','as' => 'secretary.'],function (){
        Route::get('/', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'create'])->name('add');
        Route::put('/{secretary}', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'update'])->name('update');
        Route::delete('/{secretary}', [\App\Http\Controllers\Doctor\Dashboard\DoctorSecretaryController::class, 'destroy'])->name('delete');
    });


});


Route::group(['prefix' => 'user','middleware' => ['auth:web', \App\Http\Middleware\HasAnimal::class],'as' => 'user.'], function (){

    Route::get('dashboard' ,[\App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');

    Route::group(['prefix' => 'animals', 'as' => 'animals.'], function (){
        Route::get('/', [\App\Http\Controllers\User\AnimalsController::class, 'index'])->name('index')->withoutMiddleware([\App\Http\Middleware\HasAnimal::class]);
        Route::post('/', [\App\Http\Controllers\User\AnimalsController::class, 'create'])->name('add')->withoutMiddleware([\App\Http\Middleware\HasAnimal::class]);
        Route::delete('/{animal}', [\App\Http\Controllers\User\AnimalsController::class, 'destroy'])->name('delete')->withoutMiddleware([\App\Http\Middleware\HasAnimal::class]);
    });

    Route::group(['prefix' => 'doctors', 'as' => 'doctors.'], function (){
        Route::get('/', [\App\Http\Controllers\User\DoctorController::class, 'index'])->name('index');
        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });

    Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function (){
        Route::get('/clinic', [\App\Http\Controllers\User\AppointmentsController::class, 'clinic'])->name('clinic');
        Route::get('/home', [\App\Http\Controllers\User\AppointmentsController::class, 'home'])->name('home');
        Route::post('/rate/{doctor}', [\App\Http\Controllers\User\AppointmentsController::class, 'rate'])->name('rate');
        Route::delete('/{appointment}', [\App\Http\Controllers\User\AppointmentsController::class, 'destroy'])->name('delete');
//        Route::get('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'show_appoint'])->name('showAppoint');
//        Route::post('/{doctor}', [\App\Http\Controllers\User\DoctorController::class, 'appoint'])->name('appoint');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function (){
        Route::get('/', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('index');
        Route::put('/', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('update');

    });

});

