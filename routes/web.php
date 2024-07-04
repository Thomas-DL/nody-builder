<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

@include('auth.php');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{slug}', PageController::class)->name('page');
