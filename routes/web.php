<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin']);

// Route::get('logout', [LoginController::class, 'logout']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


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

    Route::get('instructor-account', [InstrukturController::class, 'account'])->name('instructor-account');
    Route::put('instructor-account/{id}', [InstrukturController::class, 'updateAccount'])->name('instructor.updateAccount');

    Route::get('users-account', [UsersController::class, 'account'])->name('users-account');
    Route::put('users-account/{id}', [UsersController::class, 'updateAccount'])->name('users.updateAccount');

    // Route::get('course-web', [UsersController::class, 'indexWeb'])->name('course-web');
    // Route::get('course-mobile', [UsersController::class, 'indexMobile'])->name('course-mobile');

    // Route::get('course', function () {
    //     $user = Auth::user();
    //     if ($user->class_id == 1) {
    //         return redirect()->route('course-web');
    //     } elseif ($user->class_id == 2) {
    //         return redirect()->route('course-mobile');
    //     }
    //     abort(403, 'Unauthorized action.');
    // })->name('course');

    Route::resource('class', ClassController::class);
    Route::resource('instructor', InstrukturController::class);
    Route::resource('users', UsersController::class);
    Route::resource('course', CourseController::class);
});
