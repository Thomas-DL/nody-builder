<?php

use Illuminate\Support\Facades\Route;

@include('auth.php');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{slug}', function ($slug) {
    $page = App\Models\Page::where('slug', $slug)->firstOrFail();

    return view('page', compact('page'));
})->name('page');
