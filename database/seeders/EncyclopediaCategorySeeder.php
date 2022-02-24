<?php

namespace Database\Seeders;

use App\Models\EncyclopediaCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EncyclopediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'=>'Habits',
                'slug'=>'habits',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Basics',
                'slug'=>'basics',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Breeds',
                'slug'=>'breeds',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        EncyclopediaCategory::insert($categories);

    }
}
