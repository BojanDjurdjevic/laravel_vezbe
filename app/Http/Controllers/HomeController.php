<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class HomeController extends Controller
{
    private $prodRepo;

    public function __construct()
    {
        $this->prodRepo = new ProductRepository();
    }
    public function index() 
    {
        $currentTime = now()->format("H:i:s");
        $hour = date("H");
        $products = $this->prodRepo->takeLatestProducts(6);

        return view('welcome', @compact('currentTime', 'hour', 'products'));
        
    }
}
