<?php

use Illuminate\Support\Facades\Route;


Route::post('/tambah-data-mahasiswa', 'App\Http\Controllers\StudentController@store')->name('student.store');
Route::get('/tambah-data-mahasiswa', 'App\Http\Controllers\StudentController@index')->name('student.index');
Route::get('/', 'App\Http\Controllers\StudentController@dashboard')->name('student.dashboard');
