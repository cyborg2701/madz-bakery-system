<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Expenditure extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'expenditureType',
        'expenditureDescription', 
        'expenditureAmount', 
        'expenditureRemarks', 
        'created'
    ];
}
