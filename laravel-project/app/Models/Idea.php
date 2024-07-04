<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model{

    protected $fillable = [
        'id',
        'user_id',
        'theme',
        'self_chart1',
        'self_chart2',
        'self_chart3',
        'self_chart4',
        'self_chart5',
        'elevator1',
        'elevator2',
        'how',
    ];
}
