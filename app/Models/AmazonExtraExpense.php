<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmazonExtraExpense extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
        protected $fillable = [
        'cost_name',
        'cost_url',
        'amount',
        'card_name',
        ];
}
