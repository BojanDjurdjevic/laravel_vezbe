<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    private $prodRepo;

    public function __construct()
    {
        $this->prodRepo = new ProductRepository();
    }
    public function index()
    {
        $session = Session::get('product');

        $cartProducts = [];

        /* // Moj kod pre novog predavanja
        foreach($session as $p) {
            $prod = $this->prodRepo->getProductById($p['product_id']);
            $prod->ordered = $p['amount'];
            $cartProducts[] = $prod;
        }

        return view('cart', [
            'cart' => $cartProducts
        ]); */

        // ISPRAVKA domaćeg sa predavanja -> Verujem da moj kod ima problem iako radi (više upita umesto jednog):

        foreach($session as $cartItem) {
            $cartProducts[] = $cartItem['product_id'];
        }

        $products = ProductModel::whereIn("id", $cartProducts)->get();

        return view("cart", [
            'cart' => Session::get('product'),
            'products' => $products
        ]);
    }
    public function addToCart(Request $request) 
    {  
        $product = $this->prodRepo->getProductById($request->id);
        if($product->amount < $request->amount) {
            return redirect()->back()->with('error', "Nema dovoljno $product->name na stanju. Možete ubaciti do: $product->amount jedinica.");
        }
        Session::push('product', [
            'product_id' => $request->id,
             'amount' => $request->amount
        ]);

        return redirect()->route('cart');
    }
}
