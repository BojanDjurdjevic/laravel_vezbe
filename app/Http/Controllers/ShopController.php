<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() 
    {
        $products = ProductModel::all();
        return view('shop', compact('products'));
    }

    public function showProducts()
    {
        $products = ProductModel::all();
        return view('admin.products', compact('products'));
    }

    public function productForm()
    {
        return view('admin.add-product');
    }

    public function addProduct(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'amount' => 'required|numeric',
            'price' => 'required|decimal:2|min:0.01',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        ProductModel::create($validated);

        return redirect('/admin/products');
    }
}
