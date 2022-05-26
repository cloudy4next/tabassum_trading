<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmazonPoroduct extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable = [
        'user_name',
        'product',
        'original_price',
        'supplier',
        'suplier_price',
        // 'roi',
        'margin',
        'profit',
        'card_name',
    ];
}
