<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CartsHistory extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'carts_history';

    protected $fillable = [
        'user_id', 'products'
    ];
}
