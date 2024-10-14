<?php

namespace Database\Factories;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    protected $model = Idea::class;

    public function definition()
    {
        return [
            // ユーザーのファクトリを使ってランダムなユーザーを作成
            'user_id' => \App\Models\User::factory(),
            'theme' => $this->faker->numberBetween(1, 3),
            'self_chart1' => $this->faker->numberBetween(1, 5),
            'self_chart2' => $this->faker->numberBetween(1, 5),
            'self_chart3' => $this->faker->numberBetween(1, 5),
            'self_chart4' => $this->faker->numberBetween(1, 5),
            'self_chart5' => $this->faker->numberBetween(1, 5),
            'elevator1' => $this->faker->text(50),
            'elevator2' => $this->faker->text(50),
            'how' => $this->faker->text(100),
            'is_posted' => 2,
        ];
    }
}
