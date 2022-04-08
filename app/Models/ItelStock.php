<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItelStock extends Model
{
    use HasFactory;
    use CrudTrait; // <----- this
    protected $fillable = [
        'products_id',
        'stock',
        'stock_value',
    ];
}
