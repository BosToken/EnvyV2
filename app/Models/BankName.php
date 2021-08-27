<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankName extends Model
{
    protected $table = 'bank_names';
    protected $fillable = [
        'name_bank',
        'company_bank',
        'image_bank',
    ]; 

    public function bank_accounts () {
        return $this->hasMany('App\Models\BankAccount');
    } 
}
