<?php

namespace App\Http\Actions;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetUserCartsAction
{
    public static function execute(int $userId): Collection
    {
        return Cart::query()->where(['user_id' => $userId])->with('product')->get();
    }
}
