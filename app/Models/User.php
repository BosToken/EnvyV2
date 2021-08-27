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
        'bank_main_id',
        'address_main_id'
    ];

    public function addresss () {
        return $this->hasMany('App\Models\Address');
    }

    public function carts () {
        return $this->hasMany('App\Models\Cart');
    }

    public function bank_accounts () {
        return $this->hasMany('App\Models\BankAccount');
    }
    
    public function bankmain () {
        return $this->belongsTo('App\Models\BankAccount', 'bank_main_id');
    }

    public function addressmain () {
        return $this->belongsTo('App\Models\Address', 'address_main_id');
    }

}
