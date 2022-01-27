<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DashboardTestimoni extends Model
{
    use HasFactory;
    protected $table = "dbs_testimoni";
    protected $fillable =[
        'title','summary','created_user'
    ];

    public function getcreator()
    {
        return $this->hasOne(User::class,'id','created_user');
    }
}
