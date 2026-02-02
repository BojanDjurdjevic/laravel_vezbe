<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() 
    {
        return view('shop', [
            'proizvod1' => 'Knjiga',
            'proizvod2' => 'Laptop',
            'proizvod3' => 'Automobil'
        ]);
    }
}
