<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{ 
    protected $table = 'bank_accounts';
    protected $fillable = [
        'user_id',
        'bank_name_id',
        'account_name',
        'account_number',
        'main',
    ]; 

    public function users () {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function bank_names () {
        return $this->belongsTo('App\Models\BankName', 'bank_name_id');
    }
}
