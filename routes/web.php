<?php

use App\Facades\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

@include('auth.php');

Route::get('/', function () {
    if (Settings::isFeatureEnabled('is_waitlist_enabled')) {
        return view('waitlist');
    } else {
        return view('welcome');
    }
});

Route::get('/{slug}', PageController::class)->name('page');
