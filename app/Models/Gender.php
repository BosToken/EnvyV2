<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';
    protected $fillable = [
        'name_gender'
    ];

    public function products () {
        return $this->hasMany('App\Model\Product' ,'product_id');
    }
}
