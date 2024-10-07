<?php

namespace App\Http\Actions;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class AddProductUserAction
{
    public static function execute(ProductRequest $request): Product
    {
        $product = new Product([
           'name' => $request->get('name'),
           'description' => $request->get('description'),
           'price' => $request->get('price'),
        ]);
        $product->save();
        return $product;
    }
}
