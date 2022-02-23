<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// 1. Halaman Home (Route Biasa)
Route::get("/", [HomeController::class, 'index']);

// 2. Halaman Products (Route Prefix)
Route::prefix("category")->group(function(){
    Route::get("/marbel-edu-games", [ProductController::class, 'marbelEduGames']);
    Route::get("/marbel-and-friends-kind-games", [ProductController::class, 'marbelAndFriendsKindGames']);
    Route::get("/riri-story-books", [ProductController::class, 'ririStoryBooks']);
    Route::get("/kolak-kids-songs", [ProductController::class, 'kolakKidsSongs']);
});

// 3. Halaman News (Route Param)
Route::get('/news', [NewsController::class, 'news']);
Route::get('/news/{title}', [NewsController::class, 'newsTitle']);


// 4. Halaman Program (Route Prefix)
Route::prefix("program")->group(function(){
    Route::get("/karir", [ProgramController::class, 'karir']);
    Route::get("/magang", [ProgramController::class, 'magang']);
    Route::get("/kunjunganIndustri", [ProgramController::class, 'kunjunganIndustri']);
});

// 5. Halaman About Us (Route Biasa)
Route::get('/about-us',[AboutController::class, 'about']);

// 6. Halaman Contact Us (Route Resource Only)
Route::resource('/contact-us', ContactController::class, [
    'only' => ['index', 'create', 'store']
]);