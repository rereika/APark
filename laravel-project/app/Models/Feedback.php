<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'id',
        'idea_id',
        'fb_chart1',
        'fb_chart2',
        'fb_chart3',
        'fb_chart4',
        'fb_chart5',
        'comment1',
        'comment2',
        'comment3',
        'comment4',
        'comment5',
        'created_at',
        'updated_at'
    ];

    // フィードバックに関連するアイデアを取得するリレーションシップ
    public function idea()
    {
        return $this->belongsTo(Idea::class, 'idea_id', 'id');
    }

    public function getPrompts()
    {
        // JSON文字列として保存されているプロンプトを配列にデコードする例
        return json_decode($this->prompts, true);
    }
}
