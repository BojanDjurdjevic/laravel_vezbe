<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use LDAP\Result;

class ProductsController extends Controller
{
    public function index() 
    {
        $products = ProductModel::all();
        return view('admin.products', compact('products'));
    }

    public function editPrepare(ProductModel $product)
    {
        if($product === null) return die('Ovaj proizvod ne postoji!');
        return view('admin.edit-product', compact('product'));
    }

    public function update(Request $request, ProductModel $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'amount' => 'required|integer|min:0',
            'price' => 'required|decimal:2|min:0.01',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        //ovde je neki bug:
        //$product->update($validated); // ne radi, izgleda samo na masivna ažuriranja, ako sam dobro skontao iz dokumentacije
        // a možda neće i zato što ne vidi promenu slike

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->save();

        return redirect()->route('admin.products');
    }

    public function delete($product)
    {
        $singleProduct = ProductModel::where(['id' => $product])->first();

        if($singleProduct === null) {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();

        return redirect()->back();
    }
}
