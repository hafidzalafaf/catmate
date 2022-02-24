<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Encyclopedia;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class EncyclopediaController extends Controller
{
    public function list(Encyclopedia $encyclopedia, Request $request)
    {
        try {
            $all = $encyclopedia->all();
            if ($all->count() > 0) {
                // $result = $result->where('gender', "L");
                return ResponseFormatter::success([
                    'message' => "Success Get list Encyclopedia",
                    'list' => $all,
                ], 'Success get List Encyclopedia Category');
            } else {
                return ResponseFormatter::success([
                    'message' => "Successfully retrieved data but data is null",
                    'list' => null,
                ], "Data Encyclopedia NUll", 200);
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Something went wrong", 500);
        }
    }
    public function bycategory(Request $request, Encyclopedia $encyclopedia, $id)
    {
        // return $id;
        try {
            $all = $encyclopedia->where('encyclopedia_category_id', $id)->get();
            if ($all->count() > 0) {
                // $result = $result->where('gender', "L");
                return ResponseFormatter::success([
                    'message' => "Success Get list Encyclopedia",
                    'list' => $all,
                ], 'Success get List Encyclopedia Category');
            } else {
                return ResponseFormatter::success([
                    'message' => "Successfully retrieved data but data is null",
                    'list' => null,
                ], "Data Encyclopedia NUll", 200);
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Something went wrong", 500);
        }
    }
    public function detail(Encyclopedia $encyclopedia, Request $request)
    {
        try {
            $detail = $encyclopedia->load('category');
            if ($detail->count() > 0) {
                return ResponseFormatter::success([
                    'message' => "Success Get Detail Encyclopedia",
                    'detail' => $detail,
                ], 'Success get Encyclopedia Detail');
            } else {
                return ResponseFormatter::success([
                    'message' => "Successfully retrieved data but data is null",
                    'list' => null,
                ], "Encyclopedia Not Found", 200);
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Something went wrong", 500);
        }
    }
}
