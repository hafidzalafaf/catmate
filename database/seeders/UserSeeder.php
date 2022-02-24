<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
                'name'=>'semar',
                'username'=>'semar',
                'email'=>'semar@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e semar',
                'no_wa'=>'089876543211',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'gareng',
                'username'=>'gareng',
                'email'=>'gareng@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e gareng',
                'no_wa'=>'089876543212',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'petruk',
                'username'=>'petruk',
                'email'=>'petruk@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e petruk',
                'no_wa'=>'089876543213',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'bagong',
                'username'=>'bagong',
                'email'=>'bagong@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e bagong',
                'no_wa'=>'089876543214',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'puntadewa',
                'username'=>'puntadewa',
                'email'=>'puntadewa@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e puntadewa',
                'no_wa'=>'089876543215',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'werkudara',
                'username'=>'werkudara',
                'email'=>'werkudara@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e werkudara',
                'no_wa'=>'089876543216',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'janaka',
                'username'=>'janaka',
                'email'=>'janaka@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e janaka',
                'no_wa'=>'089876543217',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'nakula',
                'username'=>'nakula',
                'email'=>'nakula@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e nakula',
                'no_wa'=>'089876543218',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'sadewa',
                'username'=>'sadewa',
                'email'=>'sadewa@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e sadewa',
                'no_wa'=>'089876543219',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'=>'paino',
                'username'=>'paino',
                'email'=>'paino@example.com',
                'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'password'=>Hash::make('Password'),
                'address'=>'alamat e paino',
                'no_wa'=>'089876543210',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($user);
    }
}
