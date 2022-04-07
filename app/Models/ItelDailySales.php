<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItelDailySales extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'upfront',
        'daily_upfront',
        'date',
    ];
}
