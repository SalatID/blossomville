<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";

    public function getstore(){
        return $this->hasOne(Store::class,'id_toko','id');
    }
}
