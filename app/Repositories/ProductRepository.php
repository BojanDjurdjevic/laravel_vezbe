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
        $validated = $request->validate([
            'name' => 'required|string|min:3|unique:products',
            'description' => 'required|string|min:5',
            'amount' => 'required|int|min:0',
            'price' => 'required|decimal:2|min:0.01',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);
        $this->productModel->create($validated);
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