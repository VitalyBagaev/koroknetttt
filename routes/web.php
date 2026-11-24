<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/authpage', [UserController::class, 'authpage'])->name('authpage');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/regpage', [UserController::class, 'regpage'])->name('regpage');

Route::get('/admincourse', [UserController::class, 'admincourse'])->name('admincourse');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', action: [UserController::class,'logout'])->name('logout');
Route::get('/perpage', [UserController::class, 'perpage'])->name('perpage');

Route::post('/comment/{application}', action: [CommentsController::class,'store'])->name('commentadd');
Route::get('/reservation/{course}', [UserController::class, 'reservation'])->name('reservation');



Route::post('/courseadd', action: [CourseController::class,'courseadd'])->name('courseadd');
Route::get('/courseform', [CourseController::class, 'courseform'])->name('courseform'); 

Route::get('/courseeditform/{course}', action: [CourseController::class,'courseeditform'])->name('courseeditform');
Route::post('/courseedit/{course}', action: [CourseController::class,'courseedit'])->name('courseedit');
Route::get('/delete/{course}', action: [CourseController::class,'delete'])->name('delete');


Route::post('/application/{course}', [ApplicationsController::class, 'application'])->name('application');

Route::post('/changeStatus/{application}', [ApplicationsController::class, 'changeStatus'])->name('changeStatus');

