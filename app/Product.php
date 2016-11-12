<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $category
 * @property string $name
 * @property integer $price
 * @property integer $weight
 * @property integer $diameter
 * @property string $pathToImage
 * @property string $composition
 * @property string $description
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereDiameter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product wherePathToImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereComposition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereDescription($value)
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
