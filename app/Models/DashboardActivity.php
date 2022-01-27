<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardActivity extends Model
{
    use HasFactory;
    protected $table = "dbs_activity";

    protected $fillable =[
        'title','description','activity_date','activity_img','created_user'
    ];
}
