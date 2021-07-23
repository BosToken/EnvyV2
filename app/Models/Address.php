<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresss';
    protected $fillable = [
        'user_id',
        'country',
        'province',
        'city',
        'address',
        'post',
    ];
    public function users () {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
