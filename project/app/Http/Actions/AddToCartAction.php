<?php

namespace App\Http\Actions;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddToCartAction
{
    public static function execute(Product $product): Cart
    {
        $result = new Cart([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ]);
        $result->save();
        return $result;
    }
}
