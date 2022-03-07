<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogProgram extends Model
{
    use HasFactory;
    protected $table = 'log_program';
    protected $fillable = [
        'file','line','message','trace'
    ];
    public function __construct(array $config)
    {
        print_r($config);
        echo "modal";
        die;
        return 'model';die;
    }
}
