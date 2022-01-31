<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_config';
    protected $fillable = [
        'site_title','site_description','site_icon','site_favicon','site_whatsapp','site_whatsapp_on','site_email','site_email_on','site_instagram','site_instagram_on','site_twitter','site_twitter_on','created_user','updated_user'
    ];
}
