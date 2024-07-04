<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model{

    protected $fillable = [
        'user_id',
        'theme',
        'chart1',
        'chart2',
        'chart3',
        'chart4',
        'chart5',
        'elevator1',
        'elevator2',
        'how',
    ];
}
