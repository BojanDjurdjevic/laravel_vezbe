<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() 
    {
        $products = [
            "iPhone 14", "Samsung A52s", "Samsung A30", "iPhone 13 pro", "Huawei 80 pro"
        ];
        return view('shop', compact('products'));
    }
}
