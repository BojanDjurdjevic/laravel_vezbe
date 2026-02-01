<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view("/contact", 'contact'); // čisto da prikažem i ovaj način

Route::get("/about", function() {
    return view('about', [
        'ime' => 'Bojan',
        'prezime' => 'Đurđević'
    ]);
});

Route::get('/shop', function()  {
    return view('shop', [
        'proizvod1' => 'Knjiga',
        'proizvod2' => 'Laptop',
        'proizvod3' => 'Automobil'
    ]);
});
