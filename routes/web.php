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

Route::post('/upload', function () {
    if (request()->hasFile('file-input')) {
        if (request()->file('file-input')->isValid()) {
            $file = request()->file('file-input');
            $file->store('nody', 'do');
            // dd($path);
        } else {
            dd('File is not valid');
        }
    } else {
        dd('No file received');
    }
})->name('upload');
