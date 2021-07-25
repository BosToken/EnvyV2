<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name_product',
        'description_product',
        'image_product',
        'quantity_product',
        'price_product',
        'gender_id',
        'type_id',
        'size',
        'color',
        'archive',
    ];

    public function genders () {
        return $this->belongsTo('App\Model\Gender', 'gender_id');
    }

    public function types () {
        return $this->belongsTo('App\Model\Type', 'type_id');
    }
}
