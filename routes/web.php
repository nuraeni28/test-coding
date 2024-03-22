<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('create');
});
Route::post('/add-student', 'App\Http\Controllers\StudentController@store')->name('student.store');
