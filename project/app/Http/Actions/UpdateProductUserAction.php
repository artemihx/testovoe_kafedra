<?php

namespace App\Http\Actions;

use App\Models\Product;
use Illuminate\Http\Request;


class UpdateProductUserAction
{
    public static function execute(Product $product, Request $request): Product
    {
        $product->update($request->all());
        return $product;
    }
}
