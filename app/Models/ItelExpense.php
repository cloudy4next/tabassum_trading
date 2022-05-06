<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;

class ItelExpense extends Model
{
    use HasFactory;
    use CrudTrait; // <----- this
    protected $fillable = [
        'expense_name',
        'amount',
        'photos',
    ];

    

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('public')->delete($obj->image);
        });
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "photos";
        $disk = "public";
        $destination_path = "expense";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }
}
