<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\{CategoryController,ProductController};
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
Auth::routes();

Route::middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.master');
    });
    Route::get("/categories",[CategoryController::class,'index'])->name('categories');
    Route::get("/categories/create",[CategoryController::class,'create'])->name('create');
    Route::post("/categories",[CategoryController::class,'store'])->name('store');
    Route::get("/categories/{category}/edit",[CategoryController::class,'edit'])->name('edit');
    Route::put("/categories/{category}",[CategoryController::class,'update'])->name('update');
    Route::delete("/categories/{category}",[CategoryController::class,'destory'])->name('delete');
    Route::resource("/products",ProductController::class);
});



// //front
// Route::get('/home', function () {
//     return view('front.pages.home');
// })->name("home");
// Route::get('/products', function () {
//     return view('front.pages.products');
// })->name("products");
// Route::get('/about-us', function () {
//     return view('front.pages.about-us');
// })->name("about-us");
// Route::get('/contact', function () {
//     return view('front.pages.contact');
// })->name("contact");
