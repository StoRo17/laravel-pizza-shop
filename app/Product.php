<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @mixin \Eloquent
 */
class Product extends Model
{

    protected $fillable = [
        'category',
        'name',
        'price',
        'weight',
        'composition',
        'description',
        'pathToImage',
        'diameter'
    ];

    public $timestamps = false;
}
