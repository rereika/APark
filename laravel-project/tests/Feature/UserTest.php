<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_isWhyEngineer()
    {
        $user = User::factory()->create(['why_engineer' => 'たくさんの人の可能性を広げられる職業だから']);
        self::assertTrue($user->isWhyEngineer());
    }

    public function test_theme_rank_list()
    {
        // 認証ユーザーを作成
        $user = User::factory()->create();
        $this->actingAs($user); // 認証ユーザーとしてテストを実行

        // 2つのアイデアを作成
        $idea1 = Idea::factory()->create(['theme' => 1, 'is_posted' => 2]);
        $idea2 = Idea::factory()->create(['theme' => 1, 'is_posted' => 2]);
        Idea::factory()->create(['theme' => 1, 'is_posted' => 1]);

        // リクエストを送信
        $response = $this->get('/themeRankList?theme_rank=theme1');

        // ステータスコードの確認
        $response->assertStatus(200);

        // ビューに渡された ideas が期待されるアイデアのコレクションを持っているか確認
        $response->assertViewHas('ideas', function ($viewIdeas) use ($idea1, $idea2) {
            return $viewIdeas->contains($idea1) && $viewIdeas->contains($idea2);
        });
    }


}
