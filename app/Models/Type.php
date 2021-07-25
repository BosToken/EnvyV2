<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'name_type'
    ];

    public function products () {
        return $this->hasMany('App\Model\Product' ,'product_id');
    }
}
