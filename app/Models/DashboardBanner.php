<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardBanner extends Model
{
    use HasFactory;
    protected $table="dbs_banner";
    protected $fillable=[
        'banner_src','banner_for','created_user','updated_user'
    ];
}
