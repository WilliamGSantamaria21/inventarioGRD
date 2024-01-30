<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Los controladores creados por manos del proyecto
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;


Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('auth/login');
    });



    Auth::routes();

    // Restringir acceso a la ruta de registro
    Route::get('/register', function () {
        abort(404, 'NOT FOUND');
    })->name('register')->middleware('auth');

    // Route::middleware('can:home')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // });

    // Route::middleware('can:admin.actives.index')->group(function(){
    Route::resource('actives', App\Http\Controllers\ActiveController::class)->names('actives');
    // });

    Route::resource('transfers', App\Http\Controllers\TransferController::class)->names('transfers');

    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    // Route::middleware('can:admin.users.index')->group(function () {
    Route::resource('users', UserController::class)->names('users');
    // });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
