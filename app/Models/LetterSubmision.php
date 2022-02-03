<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterSubmision extends Model
{
    use HasFactory;
    protected $table = 'letter_submision';
    protected $fillable =[
        'letter_no','letter_id','status','letter_for','created_user'
    ];

    public function getlettertype()
    {
        return $this->hasOne(LetterType::class,'id','letter_id');
    }
}
