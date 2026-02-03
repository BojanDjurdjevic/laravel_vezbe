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
        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'amount' => 'required|numeric',
            'price' => 'required|string',
            'image' => ''
        ]);

        ProductModel::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => (int)$request->get('amount'),
            'price' => (float)$request->get('price'),
            'image' => ''
        ]);

        return redirect('/admin/products');
    }
}
