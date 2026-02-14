<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get("/about", function() {
    return view('about', [
        'ime' => 'Bojan',
        'prezime' => 'Đurđević'
    ]);
});

Route::get('/', [HomeController::class, 'index']);

//Rute od breeze:

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/contact", [ContactController::class, 'index']); 

Route::get('/shop', [ShopController::class, 'index']);

Route::post("/send-contact",[ ContactController::class, 'sendContact'])->name('send.contact');

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix('admin')->group(function() {
    Route::get('/all-contacts', [ContactController::class, 'adminContacts']);
    Route::delete("/delete-contact/{contact}", [ContactController::class, 'delete'])
        ->name('admin.contact.delete');

    Route::get('/all-products', [ProductsController::class, 'index'])
        ->name('admin.all-products');
    Route::get('/products', [ShopController::class, 'showProducts'])
        ->name('admin.products');
    Route::get('/add-product', [ShopController::class, 'productForm']);
    Route::post('/send-product', [ProductsController::class, 'addProduct'])->name('admin.send.product');
    Route::get('/edit-product/{product}', [ProductsController::class, 'editPrepare'])
        ->name('admin.product.editPrepare');
    Route::put('/update-product', [ProductsController::class, 'update'])
        ->name('admin.product.update');
    Route::delete("/delete-product/{product}", [ProductsController::class, 'delete'])
        ->name('admin.product.delete');
});

require __DIR__.'/auth.php';
