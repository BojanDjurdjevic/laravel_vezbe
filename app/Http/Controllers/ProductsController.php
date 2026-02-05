<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() 
    {
        $products = ProductModel::all();
        return view('admin.products', compact('products'));
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
