<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use LDAP\Result;

class ProductsController extends Controller
{
    private $productRepo;

    public function __construct() 
    {
        $this->productRepo = new ProductRepository();
    }
    public function index() 
    {
        $products = $this->productRepo->fetchAll();

        //$products = ProductModel::all();
        return view('admin.products', compact('products'));
    }

    public function addProduct(Request $request) 
    {
        $this->productRepo->create($request);

        return redirect('/admin/products');
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

        $this->productRepo->update($request, $product);

        return redirect()->route('admin.products');
    }

    public function delete($product)
    {
        $product = $this->productRepo->getProductById($product);

        $product->delete();

        return redirect()->back();
    }
}
