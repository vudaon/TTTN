<?php

use App\Http\Controllers\AfterCheckController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\CategoryAfterController;
use App\Http\Controllers\CategoryBeforeController;
use App\Http\Controllers\FlightCheckController;
use App\Http\Controllers\PreCheckController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\FlightCheck;
use App\Models\PreCheck;

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
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginPost');
});

Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::post('/logout', [LoginController::class, 'logout']);
// });
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::resource('/checklist', FlightCheckController::class);
    Route::resource('/airplanes', AirplaneController::class);
    Route::resource('/users', UserController::class);
    Route::get('checklist/{id}/after',[FlightCheckController::class,'editAfter'])->name('checklist.edit.after');
    Route::get('checklist/{id}/before',[FlightCheckController::class,'editBefore'])->name('checklist.edit.before');
    Route::put('checklist/{id}/after',[FlightCheckController::class,'updateAfter'])->name('checklist.update.after');
    Route::put('checklist/{id}/before',[FlightCheckController::class,'updateBefore'])->name('checklist.update.before');
    Route::put('checklist/{id}/update-categories', [FlightCheckController::class, 'updateCategories'])->name('checklist.updateCategories');
    Route::get('checklist/export/{id}',[FlightCheckController::class, 'export'])->name('checklist.export');
});