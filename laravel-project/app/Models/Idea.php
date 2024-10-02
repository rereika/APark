<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    // モデルに関連するテーブル名
    protected $table = 'ideas';

    // 可変項目
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
        'is_posted'
    ];

    // アイデアに関連するフィードバックを取得するリレーションシップ
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'idea_id', 'id'); // 'idea_id'と'ids'の指定を明確に
    }
}
