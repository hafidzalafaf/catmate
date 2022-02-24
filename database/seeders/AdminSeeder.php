<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Root',
                'username'=>'superadmin',
                'email'=>'superadmin@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e paino',
                'no_wa'=>'089876543210',
                'is_admin'=>1,
                'level'=>'root',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($users);
    }
}
