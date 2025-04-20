<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin']);

Route::get('logout', [LoginController::class, 'logout']);

// Route::group(['middleware' => 'auth'], function () {
//     Route::resource('dashboard', DashboardController::class);
// });

Route::middleware(['auth'])->group(function () {
    // Route::resource('admin', DashboardController::class);
    Route::get('admin', function () {
        return view('dashboardAdmin.index');
    })->name('admin');

    Route::get('instruktur', function () {
        return view('dashboardInstruktur.index');
    })->name('instruktur');

    Route::get('instructor-account',  function () {
        return view('instructor.account');
    })->name('instructor-account');

    Route::get('instructor-account', [InstrukturController::class, 'account'])->name('instructor-account');
    Route::put('instructor-account/{id}', [InstrukturController::class, 'updateAccount'])->name('instructor.updateAccount');

    Route::resource('class', ClassController::class);
    Route::resource('instructor', InstrukturController::class);
    Route::resource('users', UsersController::class);
});
