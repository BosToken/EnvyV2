<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'role',
        'address_id',
        // 'cart_id',
        // 'setting_id',
    ];

    public function address () {
        return $this->belongsTo('App\Models\Address', 'address_id');
    }

}
