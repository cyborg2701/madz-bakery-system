<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'prodName', 
        'prodPrice', 
        'prodCategory'
    ];

    public static function getProdPrice($id) {
        return Product::where('id', $id)
                    ->pluck('prodPrice')
                    ->first();
    }
}
