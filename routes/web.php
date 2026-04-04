<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Student', function () {
    return view('student.index', ['title' => 'STUDENT']);
});




Route::get('/Student/create', function () {
    return view('student.create', ['title' => 'CREATE STUDENT']);
});
