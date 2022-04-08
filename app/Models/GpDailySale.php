<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpDailySale extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use CrudTrait; // <----- this
    protected $fillable = [
        'product_id',
        'total_sale',
        'daily_upfront',
        'date',
    ];
}
