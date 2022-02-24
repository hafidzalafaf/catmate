<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CatController;
use App\Http\Controllers\API\OtpController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BookmarkController;
use App\Http\Controllers\API\EncyclopediaController;
use App\Http\Controllers\API\EncyclopediaCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['verifyAccessKey'])->group(function () {
    Route::post('/register', [UserController::class, 'Register'])->name('api.Register');
    Route::post('/login', [UserController::class, 'Login'])->name('api.Login');

    Route::post('/otp', [OtpController::class, 'confirmOtp'])->name('api.Otp');
    Route::post('/otp/change_email', [OtpController::class, 'changeEmail'])->name('api.OtpchangeEmail');
    Route::post('/otp/resend', [OtpController::class, 'resend'])->name('api.Otpresend');

    Route::post('/forgotPassword', [UserController::class, 'forgotPassword'])->name('api.forgotPassword');
    Route::post('/resetPassword', [UserController::class, 'resetPassword'])->name('api.resetPassword');
});



Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [UserController::class, 'Logout'])->name('api.Logout');
    Route::get('/refresh_user', [UserController::class, 'refreshUser'])->name('api.refreshUser');
    Route::post('/coba', [UserController::class, 'Coba'])->name('api.Coba');

    //create by ihsan
    Route::post('/cat/add', [CatController::class, 'add'])->name('api.AddCat');
    Route::post('/cat/edit', [CatController::class, 'edit'])->name('api.EditCat');
    // Route::post('/cat/user', [CatController::class, 'user'])->name('api.UserEdit');
    // Route::post('/cat/password', [CatController::class, 'password'])->name('api.UserPassword');
    Route::post('/cat/coba', [CatController::class, 'coba'])->name('api.cobaCat');
    Route::get('/cat', [CatController::class, 'catList'])->name('api.CatList');
    Route::get('/mycat', [CatController::class, 'mycat'])->name('api.CatList');

    Route::post('/user/edit', [UserController::class, 'edit'])->name('api.UserEdit');
    Route::post('/password', [UserController::class, 'password'])->name('api.UserPassword');

    Route::post('/like/add', [LikeController::class, 'add'])->name('api.LikeAdd');
    Route::get('/like/matched', [LikeController::class, 'matched'])->name('api.Matched');
    Route::get('/like/liketo', [LikeController::class, 'liketo'])->name('api.LikesTo');
    Route::get('/like/likefrom', [LikeController::class, 'likefrom'])->name('api.LikesFrom');


    Route::get('/encyclopedia/category', [EncyclopediaCategoryController::class, 'index'])->name('api.encyclopediaCategory');
    Route::get('/encyclopedia', [EncyclopediaController::class, 'list'])->name('api.encyclopediaList');
    // Route::get('/encyclopedia/detail', [EncyclopediaController::class, 'detail'])->name('api.encyclopediaDetail');
    Route::get('/encyclopedia/{category}', [EncyclopediaController::class, 'bycategory'])->name('api.encyclopediaByCategoryList');

    Route::post('/encyclopedia/detail/{encyclopedia}', [EncyclopediaController::class, 'detail'])->name('api.encyclopediaDetail');


    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('api.indexBookmark');
    Route::post('/bookmark/add', [BookmarkController::class, 'add'])->name('api.addBookmark');
    Route::post('/bookmark/delete/', [BookmarkController::class, 'delete'])->name('api.deleteBookmark');
});
