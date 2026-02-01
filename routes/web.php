<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Test 123";
});

Route::view("/contact", 'contact');

Route::get("/about", function() {
    return view('about', [
        'ime' => 'Bojan',
        'prezime' => 'Đurđević'
    ]);
});
