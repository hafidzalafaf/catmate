<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $row = mt_rand(1,5);
        return [
            'user_id' => mt_rand(1,5),

        ];
    }
}
