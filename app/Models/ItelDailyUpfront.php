<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItelDailyUpfront extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use CrudTrait; // <----- this
    protected $fillable = [
        'total_product',
        'total_upfront',
    ];
}
