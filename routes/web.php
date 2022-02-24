<?php

use App\Models\User;
use App\Models\Encyclopedia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\EncyclopediaCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\EncyclopediaController;
use App\Http\Controllers\EncyclopediaCategoryController;

// landing
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'userIsAdmin'])->group(function () {

    Route::get('/', [Controller::class, 'dashboard'])->name('dashboard');

    Route::get('/encyclopedia/category', [EncyclopediaCategoryController::class, 'index'])->name('encyclopedia.category.table');
    Route::post('/encyclopedia/category', [EncyclopediaCategoryController::class, 'store'])->name('encyclopedia.category.store');
    Route::post('/encyclopedia/category/data', function () {
        return DataTables::of(EncyclopediaCategory::query())->make(true);
    })->name('encyclopedia.category.data');
    Route::get('/encyclopedia/category/add', [EncyclopediaCategoryController::class, 'create'])->name('encyclopedia.category.add');
    Route::put('/encyclopedia/category/{encyclopediaCategory}', [EncyclopediaCategoryController::class, 'update'])->name('encyclopedia.category.update');
    Route::get('/encyclopedia/category/detail/{encyclopediaCategory}', [EncyclopediaCategoryController::class, 'show'])->name('encyclopedia.category.detail');
    Route::get('/encyclopedia/category/edit/{encyclopediaCategory}', [EncyclopediaCategoryController::class, 'edit'])->name('encyclopedia.category.edit');
    Route::delete('/encyclopedia/category/{encyclopediaCategory}', [EncyclopediaCategoryController::class, 'destroy'])->name('encyclopedia.category.delete');

    Route::get('/encyclopedia', [EncyclopediaController::class, 'index'])->name('encyclopedia.table');
    Route::post('/encyclopedia', [EncyclopediaController::class, 'store'])->name('encyclopedia.store');
    Route::post('/encyclopedia/data', function () {
        return DataTables::of(Encyclopedia::query()->with('category'))->make(true);
    })->name('encyclopedia.data');
    Route::get('/encyclopedia/add', [EncyclopediaController::class, 'create'])->name('encyclopedia.add');
    Route::put('/encyclopedia/{encyclopedia}', [EncyclopediaController::class, 'update'])->name('encyclopedia.update');
    Route::get('/encyclopedia/detail/{encyclopedia}', [EncyclopediaController::class, 'show'])->name('encyclopedia.detail');
    Route::get('/encyclopedia/edit/{encyclopedia}', [EncyclopediaController::class, 'edit'])->name('encyclopedia.edit');
    Route::delete('/encyclopedia/{encyclopedia}', [EncyclopediaController::class, 'destroy'])->name('encyclopedia.delete');

    Route::get('/admin', [UserController::class, 'index'])->name('admin.table');
    Route::post('/admin', function () {
        return DataTables::of(User::where('is_admin', 1))->make(true);
    })->name('admin.data');
    Route::get('/admin/add', [UserController::class, 'create'])->name('admin.add');
    Route::post('/admin/add', [UserController::class, 'store'])->name('admin.store');
    Route::get('/admin/{user}', [UserController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/{user}', [UserController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('admin.delete');
});


// landing
Route::group(['prefix' => '{locale}', 'middleware' => ['ensureLocaleIsNotEmpty']], function () {
    Route::get('/', function () {
        return view('main');
    })->name('home');
});

Route::post('/send-email', function (Request $request) {

    $rules = [
        'email' => ['required', 'email'],
        'message' => ['required'],
        'name' => ['required'],
    ];

    $request->validate($rules);

    $maildata = [
        'email' => $request->email,
        'message' => $request->message,
        'name' => $request->name,
    ];

    Mail::to('contact@tupaitech.net')->send(new SendEmail($maildata));

    return redirect()->to(route('home', ['locale' => session('language')]));
})->name('send-email');

Route::post('/change-language', function (Request $request) {
    // $languages = array_keys(config('app.languages'));
    session()->put('language', $request->lang);

    return 'success';
})->name('changeLanguage');

Route::get('/locale', function () {
});
