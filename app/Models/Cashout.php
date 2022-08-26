<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashout extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'cashoutName', 
        'amount', 
        'created_at',
    ];
}
