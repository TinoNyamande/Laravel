<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HousesController ;
use App\Http\Controllers\PostsController ;
use Illuminate\Support\Facades\Route;

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

Route::get("/dashboard",[HousesController::class,'index'])->name("dashboard");

Route::get("/dashboard/create", [HousesController::class,'create'])->name("dashboard.create");

Route::post("/dashboard/create", [HousesController::class,'store'])->name("dashboard.store");
//show
//Route::get("/dashboard/{house}")
//edit
Route::get("/dashboard/{house}/edit",[HousesController::class,'edit'])->name("posts.edit");
//update
//Route::get("/dashboard/{house}")
//delete
Route::get("/dashboard/{house}",  [HousesController::class,'destroy'])->name("posts.destroy");
Route::get("/",[PostsController::class,'show'])->name("home");
Route::get('/back' ,function() {
    return view('dashboard');
})->name('back');
Route::get("/for sale",[PostsController::class,'sale'])->name("sale");
Route::get("/for rent",[PostsController::class,'rent'])->name("rent");

Route::get('/houses for rent' ,[PostsController::class ,'forRent'])->name('forRent');

Route::get('/houses for sale' ,[PostsController::class ,'forSale'])->name('forSale');

//Route::get('/dashboard', function () {
 //   return view('posts.index');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
