<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Cat;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public function add(Request $request)
    {
        $user = $request->user();
        $cats = Cat::where('id', $request->user()->id)->first();
        // return $cats;
        try {
            $rules = [
                'id' => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return ResponseFormatter::error([
                    'message' => "Invalid validation",
                    'error' => [
                        'validation' => $validator->errors()
                    ],
                ], 'Something went wrong', 406);
            }
            Like::create([
                'user_id' => $user->id,
                'cat_id' => $cats->id,
                'cat_mate_id' => $request->id,
            ]);

            return ResponseFormatter::success(null, 'Likes has been successfull added!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }

    public function matched(Request $request, Cat $cat)
    {
        $user = $request->user();
        // return $user->password;
        try {
            $cats = Cat::where('user_id', $request->user()->id)->first();
            $matched = $cats->matches->load('user');
            return ResponseFormatter::success($matched, 'Successfull get matched data!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }
    public function liketo(Request $request, Cat $cat)
    {
        $user = $request->user();
        // return $user->password;
        try {
            $cats = Cat::where('user_id', $request->user()->id)->first();
            $liketo = $cats->likesToCats;
            return ResponseFormatter::success($liketo, 'Successfull get Like To another data!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }
    public function likefrom(Request $request, Cat $cat)
    {
        $user = $request->user();
        // return $user->password;
        try {
            $cats = Cat::where('user_id', $request->user()->id)->first();
            $matched = $cats->likesFromCats;
            return ResponseFormatter::success($matched, 'Successfull get Like From another data!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }
}
