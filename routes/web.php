<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/about", function() {
    return view('about', [
        'ime' => 'Bojan',
        'prezime' => 'Đurđević'
    ]);
});

Route::get('/', [HomeController::class, 'index']);

Route::get("/contact", [ContactController::class, 'index']); 

Route::get('/shop', [ShopController::class, 'index']);

Route::get('/admin/all-contacts', [ContactController::class, 'adminContacts']);

Route::post("/send-contact",[ ContactController::class, 'sendContact']);

Route::get('/admin/add-product', [ShopController::class, 'productForm']);
Route::post('send-product', [ShopController::class, 'addProduct']);
Route::get('/admin/products', [ShopController::class, 'showProducts']);
