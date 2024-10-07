<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartsHistory extends Model
{
    use HasFactory;

    protected $table = 'carts_history';

    protected $fillable = [
        'user_id', 'products'
    ];
}
