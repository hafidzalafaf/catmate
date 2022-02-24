<?php

namespace Database\Seeders;

use App\Models\ApiUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserAPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAPIs=[
            [
                'project_name'=>'catmate apps',
                'is_active'=>1,
                'ability'=>'*',
                'token'=>'95dc011433bd456592f7ae987a76d379',
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        ApiUser::insert($userAPIs);
    }
}
