<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Cat;
use Illuminate\Database\Seeder;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats=[
            [
                'name' => 'Zhao Yun',
                'user_id' => 1,
                'breed' => 'Shu',
                'age' => 10,
                'gender' => 'L',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1519052537078-e6302a4968d4.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Liu Bei',
                'user_id' => 2,
                'breed' => 'Shu',
                'age' => 11,
                'gender' => 'L',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1557427705-d543f7da720f.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lu Bu',
                'user_id' => 3,
                'breed' => 'Han',
                'age' => 12,
                'gender' => 'L',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1545529468-42764ef8c85f.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Diao Chan',
                'user_id' => 4,
                'breed' => 'Han',
                'age' => 12,
                'gender' => 'P',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1574063413132-354db9f190fd.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Zhuge Liang',
                'user_id' => 5,
                'breed' => 'Han',
                'age' => 12,
                'gender' => 'P',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1631307494857-fa85ac2c6c38.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Guan Yu',
                'user_id' => 6,
                'breed' => 'Shu',
                'age' => 10,
                'gender' => 'L',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1545529468-42764ef8c85fedit.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pang Tong',
                'user_id' => 7,
                'breed' => 'Shu',
                'age' => 11,
                'gender' => 'L',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1557427705-d543f7da720fcopy.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sun Shang Xiang',
                'user_id' => 8,
                'breed' => 'Han',
                'age' => 12,
                'gender' => 'L',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1519052537078-e6302a4968d4copy.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cao Cao',
                'user_id' => 9,
                'breed' => 'Han',
                'age' => 12,
                'gender' => 'P',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1574063413132-354db9f190fdcopy.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cao Pi',
                'user_id' => 10,
                'breed' => 'Han',
                'age' => 12,
                'gender' => 'P',
                'color' => 'Blue',
                'bio' => 'kucing ras',
                'image' => 'cat-image/1631307494857-fa85ac2c6c38copy.jpg',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Cat::insert($cats);
    }
}
