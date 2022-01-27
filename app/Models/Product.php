<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
        'product_name','price','description','active','image','id_toko','created_user'
    ];

    public function getstore(){
        return $this->hasOne(Store::class,'id','id_toko');
    }
}
