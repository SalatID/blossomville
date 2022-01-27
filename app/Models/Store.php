<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table="store";
    protected $fillable = [
        'store_name','address','description','store_banner','store_logo','phone','whatsapp_sts','created_user'
    ];

    public function getproduct(){
        return $this->hasMany(Product::class,'id_toko','id');
    }
}
