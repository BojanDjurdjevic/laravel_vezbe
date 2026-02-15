<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if(count($session) < 1) return redirect('/shop');

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
        /*
        foreach($session as $cartItem) {
            $cartProducts[] = $cartItem['product_id'];
        } */
        $cartProducts = array_column(Session::get('product'), 'product_id'); // radi isto što i petlja

        //$products = ProductModel::whereIn("id", $cartProducts)->get();
        

        // Četić optimizacija:

        $combined = [];
        foreach ($session as $item) {
            $product = ProductModel::firstWhere('id', $item['product_id']);
            if($product) {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $item['amount'] * $product->price 
                ];
            }
        }

        return view("cart", [
            'items' => $combined
        ]);
        /* // Stari kod
        return view("cart", [
            'cart' => Session::get('product'),
            'products' => $products
        ]); */
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

    public function finishOrder()
    {
        $cart = Session::get('product');
        $totalCartPrice = 0;

        foreach ($cart as $item) {
            $product = ProductModel::firstWhere('id', $item['product_id']);
            $totalCartPrice += $item['amount'] * $product->price;

            if($item['amount'] > $product->amount) {
                return redirect()->back()->with('error', "Nema dovoljno proizvoda $product->name na stanju. Trenutno možete poručiti do $product->amount jedinica!");
            }
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
        ]);

        foreach ($cart as $item) {
            $product = ProductModel::firstWhere('id', $item['product_id']);
            $product->amount -= $item['amount'];
            
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'order_amount' => $item['amount'],
                'price' => $product->price * $item['amount']
            ]);
        }

        Session::remove('product');

        return view('thankYou');
    }
}
