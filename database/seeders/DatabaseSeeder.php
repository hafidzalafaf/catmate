<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cat;
use App\Models\Like;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $faker = Faker::create(); // faker


        // //user seeder
        // User::factory(5)->create(); //create user


        // //cat seeder
        // $a = 5;
        // $gender = $faker->unique(true)->randomElement(['L', 'P']);
        // for ($i = 1; $i < ($a + 1); $i++) {
        //     cat::create([
        //         'name' => $faker->name(),
        //         'user_id' => $i,
        //         'breed' => mt_rand(1, 7),
        //         'age' => mt_rand(1, 10),
        //         'gender' => $gender,
        //         'color' => 'random',
        //         'bio' => 'kucing ras',
        //         'image' => 'cat-image/default.png'
        //     ]);
        // }

        // $number = [];
        // for ($i=1; $i < ($a + 1); $i++) { 
        //     $number[] = $i;
        // }


        // for ($i = 1; $i < ($a + 1); $i++) {
        //     $row = mt_rand(1, $a);
        //     unset($number[$row]);
        //     // dd($number);
        //     Like::create([
        //         'user_id' => $row,
        //         'cat_id' => $row,
        //         'cat_mate_id' => $faker->randomElement($number)
        //     ]);
        // }

        $this->call(UserSeeder::class);
        $this->call(CatSeeder::class);
        $this->call(UserAPISeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(EncyclopediaCategorySeeder::class);
        $this->call(AdminSeeder::class);
    }
}
