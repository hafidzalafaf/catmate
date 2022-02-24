<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\BookmarkEncyclopedia;
use Illuminate\Support\Facades\Validator;

class BookmarkController extends Controller
{
    public function index(BookmarkEncyclopedia $bookmark, Request $request)
    {
        $user = $request->user();
        try {
            $all = $user->Bookmark->load('encyclopedia');
            if ($all->count() > 0) {
                // $result = $result->where('gender', "L");
                return ResponseFormatter::success([
                    'message' => "Success Get MyBookmark",
                    'list' => $all,
                ], 'Success get MyBookmark');
            } else {
                return ResponseFormatter::success([
                    'message' => "Successfully retrieved data but data is null",
                    'list' => null,
                ], "Data Bookmark NUll");
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Something went wrong", 500);
        }
    }

    public function add(BookmarkEncyclopedia $bookmark, Request $request)
    {
        // return $request->file('image');
        $user = $request->user();
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

            BookmarkEncyclopedia::create([
                'user_id' => $user->id,
                'encyclopedia_id' => $request->id,
            ]);

            return ResponseFormatter::success(null, 'Bookmark has been successfull added!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }
    public function delete(Request $request, BookmarkEncyclopedia $bookmark,)
    {
        $user = $request->user();
        // return $bookmark;
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

            $bookmark->where(['encyclopedia_id' =>  $request->id, 'user_id' => $user->id])->delete();

            return ResponseFormatter::success(null, 'Bookmark has been successfull deleted!');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], "Authentication Failed", 500);
        }
    }
}
