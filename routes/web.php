<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;



//Rute od breeze:

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//--------------------------------

Route::get("/about", function() {
    return view('about', [
        'ime' => 'Bojan',
        'prezime' => 'Đurđević'
    ]);
});

Route::get('/', [HomeController::class, 'index']);

Route::controller(ContactController::class)->group(function() {
    Route::get("/contact",  'index'); 
    Route::post("/send-contact",'sendContact')->name('send.contact');
});

Route::get('/shop', [ShopController::class, 'index']);

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix('admin')->group(function() {
    Route::controller(ContactController::class)->prefix('contact')->group(function() {
        Route::get('/all', 'adminContacts')->name('all-contacts');
        Route::delete("/delete/{contact}", 'delete')
            ->name('admin.contact.delete');
    });
    
    Route::controller(ShopController::class)->group(function() {
        Route::get('/products',  'showProducts')
            ->name('admin.products');
    });
    
    Route::controller(ProductsController::class)->prefix('product')->group(function() {
        Route::get('/all',  'index')
            ->name('admin.all-products');
        Route::get('/add-product', 'productForm')->name('add-product');
        Route::get('/edit/{product}',  'editPrepare')
            ->name('admin.product.editPrepare');
        Route::post('/send', 'addProduct')->name('admin.send.product');
        Route::put('/update', 'update')
            ->name('admin.product.update');
        Route::delete("/delete/{product}",  'delete')
            ->name('admin.product.delete');
    });
    
    
});

require __DIR__.'/auth.php';
