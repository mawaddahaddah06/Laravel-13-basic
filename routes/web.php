<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Student', [StudentController::class, 'index']);
Route::get('/Student/create', [StudentController::class, 'create']);




Route::get('/Student/create', function () {
    return view('student.create', ['title' => 'CREATE STUDENT']);
});
