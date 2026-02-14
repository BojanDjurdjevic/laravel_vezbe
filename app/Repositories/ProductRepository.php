<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository 
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function test()
    {
        dd('Test product Rep');
    }

    public function fetchAll()
    {
        return $this->productModel::all();
    }

    public function getProductById($id)
    {
        return $this->productModel->where(['id' => $id])->first();
    }

    public function create($request)
    {
        $this->productModel->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image')
        ]);
    }

    public function update($request, $product)
    {
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->save();
    }

    public function delete($product)
    {
        $singleProduct = self::getProductById($product);

        if($singleProduct === null) {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();
    }
}