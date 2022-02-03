<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterSubmisionLog extends Model
{
    use HasFactory;
    protected $table = 'letter_submision_log';
    protected $fillable = [
        'sts_before','sts_after','id_letter_submision','created_user'
    ];

    public function getlettersubmision()
    {
        return $this->hasOne(LetterSubmision::class,'id','id_letter_submision');
    }
}
