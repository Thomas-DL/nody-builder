<?php

use Illuminate\Support\Facades\Route;

@include('auth.php');

Route::get('/', function () {
    return view('welcome');
});
