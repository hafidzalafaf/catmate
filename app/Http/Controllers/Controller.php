<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Encyclopedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        $encyclopedia_count = Encyclopedia::count();
        $user_count = User::NotAdmin()->count();
        $graph=[];
        
        for ($i=1; $i <= 12; $i++) { 
            array_push($graph, User::NotAdmin()->ByMonth($i)->ThisYear()->count());
        }

        $graph=implode(',',$graph);
        return view('home',['encyclopedia_count'=>$encyclopedia_count,'user_count'=>$user_count,'graph'=>$graph]);
    }
}
