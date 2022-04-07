<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammenphoneDailyUpfront extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_product',
        'total_upfront',
    ];
}
