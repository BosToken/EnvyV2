<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        // app
        'title_app',
        'lang_app',
        'image_app',
        
        // contact
        'email_app',
        'instagram_app',
        'whatsapp_app',
    ];
}
