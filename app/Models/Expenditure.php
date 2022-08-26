<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Expenditure extends Model
{
    public $timestamps = FALSE;
    // protected $dateFormat = 'Y-m-d';
    use HasFactory;
    protected $fillable = [ 
        'expenditureName', 
        'expenditureAmount', 
        'created'
    ];
}
