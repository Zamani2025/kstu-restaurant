<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableCotroller;
use App\Http\Controllers\Admin\ReservationCotroller;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController;


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

Route::get("/", [HomeController::class, "index"])->name("home.index");

Route::get("/categories", [FrontendCategoryController::class, "index"])->name("categories.index");
Route::get("/categories/{category}", [FrontendCategoryController::class, "show"])->name("categories.show");
Route::get("/menus", [FrontendMenuController::class, "index"])->name("menus.index");
Route::get("/reservations/step-one", [ReservationController::class, "stepOne"])->name("reservations.step.one");
Route::post("/reservations/step-one", [ReservationController::class, "storeStepOne"])->name("reservations.store.step.one");
Route::get("/reservation/step-two", [ReservationController::class, "stepTwo"])->name("reservation.step.two");
Route::post("/reservations/step-two", [ReservationController::class, "storeStepTwo"])->name("reservations.store.step.two");
Route::get("/thankyou", [HomeController::class, "thankyou"])->name("thankyou.page");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//For Admin Middleware Routes
Route::middleware(["auth", "admin"])->name("admin.")->prefix("admin")->group(function(){
    Route::get("/", [AdminController::class, "index"])->name("index");
    Route::resource("/categories", CategoryController::class);
    Route::resource("/tables", TableCotroller::class);
    Route::resource("/menus", MenuController::class);
    Route::resource("/reservation", ReservationCotroller::class);
});
