<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            //fakerでランダムに作成
            'user_name' => $this->faker->name,

            //passwordをハッシュ化
            'password' => bcrypt('password'),

            //fakerでランダムに作成
            'batch' => $this->faker->numberBetween(1, 7),

            //fakerでランダムに作成
            'why_engineer' => $this->faker->sentence,
        ];
    }
}
