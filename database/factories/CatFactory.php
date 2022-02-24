<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cat;

class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['L', 'P']);
        $number = $this->faker->randomElement([1, 2, 3, 4, 5]);
        $a = 1;
        return [
            'name' => $this->faker->name(),
            // 'user_id' => $this->faker->unique(true)->randomElement(Cat::pluck('user_id', 'user_id')->toArray()),
            'user_id' => mt_rand(1,5),
            'breed' => mt_rand(1, 7),
            'age' => mt_rand(1, 10),
            'gender' => $gender,
            'color' => 'random',
            'bio' => 'kucing ras',
            'image' => 'cat-image/default.png'
        ];
    }
}
