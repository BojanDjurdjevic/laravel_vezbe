<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
        $products = ProductModel::all();
        //$products = $this->productRepo->fetchAll(); // probe radi
        
        return view('admin.products', compact('products'));
    }

    public function addProduct(SaveProductRequest $request) 
    {
        $this->productRepo->create($request);

        return redirect('/admin/products');
    }

    public function editPrepare(ProductModel $product)
    {
        if($product === null) return die('Ovaj proizvod ne postoji!');
        return view('admin.edit-product', compact('product'));
    }

    public function update(UpdateProductRequest $request, ProductModel $product)
    {
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
