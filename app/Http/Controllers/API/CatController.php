<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Cat;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CatController extends Controller
{


    public function add(Request $request)
    {
        // return $request->file('image');
        $user = $request->user();
        try {
            $rules = [
                'name' => ['required', 'max:255'],
                'breed' => ['required'],
                'age' => ['required', 'min:1'],
                'gender' => ['required'],
                'color' => ['required'],
                'bio' => ['required'],
                'image' => ['image', 'file', 'max:1024'],
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
            $image = "cat-image/default.png";
            if ($request->file('image')) {
                $image = $request->file('image')->store('cat-image');
            }
            Cat::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'breed' => $request->breed,
                'age' => $request->age,
                'gender' => $request->gender,
                'color' => $request->color,
                'bio' => $request->bio,
                'image' => $image,
            ]);

            return ResponseFormatter::success(null, 'Cat has been successfull added!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }

    public function edit(Request $request, Cat $cat)
    {
        $user = $request->user();
        $cats = Cat::where('id', $request->user()->id)->first();
        // return $cats;
        try {
            $rules = [
                'name' => ['required', 'max:255'],
                'breed' => ['required'],
                'age' => ['required', 'max:3'],
                'gender' => ['required'],
                'color' => ['required'],
                'bio' => ['required'],
                'image' => ['image', 'file', 'max:1024'],
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
            $image = "cat-image/default.png";
            if ($request->file('image')) {
                if ($cats->image != null && $cats->image != $request->file('image')) {
                    Storage::delete($cats->image);
                }
                $image = $request->file('image')->store('cat-image');
            }
            Cat::where('id', $cats->id)->update([
                'name' => $request->name,
                'breed' => $request->breed,
                'age' => $request->age,
                'gender' => $request->gender,
                'color' => $request->color,
                'bio' => $request->bio,
                'image' => $image,
            ]);

            return ResponseFormatter::success(null, 'Cat has been successfull updated!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }

    public function coba(Request $request, Cat $cat)
    {
        $mycat = $cat->where('user_id', $request->user()->id)->first();
        $notin = $mycat->getList->pluck('id');
        $notin =  $notin->push($mycat->id);
        $cats = $cat->all();
        $result = $cats->whereNotIn('id', $notin);
        // $result = $result->where('gender', "L");
        return $result;
    }

    public function catList(Request $request, Cat $cat)
    {
        if ($mycat = $cat->where('user_id', $request->user()->id)->first()) {
            $notin = $mycat->getList->pluck('id');
            $notin =  $notin->push($mycat->id);
            $gender = ['P' => 'L', 'L' => 'P'];
            $result = Cat::whereNotIn('id', $notin)->where('gender', $gender[$mycat->gender])->get();
            // $result = $result->where('gender', "L");
            return ResponseFormatter::success([
                'catlist' => $result,
            ], 'Success get cat list');
        } else {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
            ], "You Dont Have a Cat", 500);
        }
    }
    public function mycat(Request $request, Cat $cat)
    {
        if ($mycat = $cat->where('user_id', $request->user()->id)->first()) {
            // return $mycat;
            // $result = $result->where('gender', "L");
            return ResponseFormatter::success([
                'message' => "Success get MyCat",
                'mycat' => $mycat,
                'cat' => true,
            ], 'Success get MyCat');
        } else {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'mycat' => null,
                'cat' => false,
            ], "You Dont Have a Cat", 200);
        }
    }
}
