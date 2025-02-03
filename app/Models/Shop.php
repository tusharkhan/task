<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\ShopFactory> */
    use HasFactory;

    protected $guarded = ['_token'];
}
