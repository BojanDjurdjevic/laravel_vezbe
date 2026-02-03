<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class HomeController extends Controller
{
    public function index() 
    {
        $currentTime = now()->format("H:i:s");
        $hour = date("H");
        $products = ProductModel::orderBy('id', 'desc')
        ->take(6)
        ->get()
        ;

        return view('welcome', @compact('currentTime', 'hour', 'products'));
        
    }
}
