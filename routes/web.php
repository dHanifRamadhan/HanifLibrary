<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\regisController;
use App\Http\Controllers\officerController;

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

Route::get('/', function () {
    // return view('Mails.accept-account');
    return view('form.dashboard');
})->name('main');

Route::get('home', function(){
    return redirect()->route('main');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('login', [loginController::class, 'authLogin'])->name('auth.login');
    Route::post('login', [loginController::class,'login'])->name('login');
    Route::get('register', [regisController::class, 'authRegis'])->name('auth.regis');
    Route::post('register', [regisController::class, 'regis'])->name('regis');
    Route::get('auth/register/accept-account/{id}', [regisController::class, 'acceptAccount'])->name('accept.account');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('auth/logout', [loginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'role:admin'], function() {
    Route::get('officer', [officerController::class, 'index'])->name('officer');
    Route::get('officer/create', function() {
        return view('form.officer.create');
    })->name('officer.create');
});
