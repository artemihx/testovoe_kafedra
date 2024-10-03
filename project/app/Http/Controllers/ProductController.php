<?php

namespace App\Http\Controllers;

use App\Http\Actions\AddToCartAction;
use App\Http\Actions\GetUserCartsAction;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function addToCart(Product $product)
    {
        $cart = AddToCartAction::execute($product);
        return response()->json(['message' => 'Product add to cart'], 201);
    }

    public function getCart()
    {
        $carts = GetUserCartsAction::execute(auth()->id());
        return response()->json($carts, 200);
    }

    public function deleteFromCart(Cart $cart)
    {
        $cart->delete();
        return response()->json(['message' => 'Item removed from cart'], 200);
    }
}
