<?php

namespace App\Http\Actions;

use App\Models\Cart;
use App\Models\CartsHistory;
use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use function MongoDB\BSON\toJSON;
use function Sodium\add;

class MakeOrderUserAction
{
    public static function execute(int $user_id)
    {
        $carts = Cart::all()->where('user_id', $user_id);
        if($carts->count() > 0)
        {
            $products  = [];
            foreach ($carts as $cart)
            {
                $products[] = $cart->product->id;
            }
            $newOrder = new CartsHistory([
                'user_id' => auth()->id(),
                'products'=> json_encode($products),
            ]);
            $newOrder->save();
            Cart::destroy($carts);
            return $newOrder;
        }
        throw new HttpResponseException(response()->json(['error'=> 422,'message' => 'Cart is empty'], 422));
    }
}
