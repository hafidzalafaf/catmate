<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EncyclopediaCategory;
use App\Models\Encyclopedia;

use App\Helpers\ResponseFormatter;


class EncyclopediaCategoryController extends Controller
{
    public function index(Request $request, EncyclopediaCategory $category)
    {
        $all = $category->all();
        if ($all->count() > 0) {
            // $result = $result->where('gender', "L");
            return ResponseFormatter::success([
                'list' => $all,
            ], 'Success get List Encyclopedia Category');
        } else {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
            ], "Data Encyclopedia Category NUll", 200);
        }
    }
}
