<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class GrammenphoneProduct extends Model
{
    use CrudTrait;
    // use HasRoles;
    use HasFactory;
    protected $fillable = [
        'name',
        'distributor_price',
        'retail_price',
        'upfront',
    ];
}
