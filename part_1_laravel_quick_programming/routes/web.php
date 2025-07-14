<?php

use Illuminate\Support\Facades\Route;

// Import controllers
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

// Import middleware
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\checkLogin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return view('user');
});

Route::get('/user/{id}', function ($id) {
    $sampleMessage = "Good evening!!!";
    return view('user', ['id'=>$id, 'sampleMessage'=>$sampleMessage]);
});


// From PageController
Route::middleware(['checkLogin:admin'])->group(function(){
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/about/{id}', [PageController::class, 'about'])->name('about');
    Route::get('/showform',[PageController::class,'showForm'])->name('showForm');
    Route::get('/sessiontest',[PageController::class,'sessiontest'])->name('sessiontest');    
});


// Route::get('/about', [PageController::class, 'about'])->name('about');
// Route::get('/about/{id}', [PageController::class, 'about'])->name('about');
// Route::get('/showform',[PageController::class,'showForm'])->name('showForm');
// Route::get('/sessiontest',[PageController::class,'sessiontest'])->name('sessiontest');
// Route::post('/handleForm',[PageController::class,'handleForm'])->name('handleForm');

// From CustomerController
Route::get('/addcustomer',[CustomerController::class,'addcustomer'])->name('addcustomer')->middleware(ValidUser::class, TestUser::class);
Route::post('/insertcustomer',[CustomerController::class,'insertcustomer'])->name('insertcustomer');
Route::post('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer'])->name('deletecustomer');
Route::get('/editcustomer/{id}', [CustomerController::class, 'editcustomer'])->name('editcustomer');
Route::post('/updatecustomer', [CustomerController::class, 'updatecustomer'])->name('updatecustomer');

// From DashboardController
Route::get('/showdashboard',[DashboardController::class,'showdashboard'])->name('showdashboard');

// From UserController
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/registersave',[UserController::class,'registersave'])->name('registersave');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/loginsave',[UserController::class,'loginsave'])->name('loginsave');
Route::get('/logout',[UserController::class,'logout'])->name('logout');



