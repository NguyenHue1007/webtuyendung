<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Employer\Auth\LoginController;
use App\Http\Controllers\Employer\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\Employer\PostJobController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/index', function () {
//     return view('employer.post-job');
// });

// Route::get('/register', function () {
//     return view('employer.register');
// });
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/admin', function () {
    return view('admin.dashboard.index');
});

Route::group([
    'prefix'    => 'employer',
    'namespace' => 'Auth',
], function () {
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('employer.register.index');
    Route::post('register', [RegisterController::class, 'register'])->name('employer.register');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('employer.login.index');
    Route::post('login', [LoginController::class, 'login'])->name('employer.login');
    Route::post('logout', [LoginController::class, 'logout'])->name('employer.logout');
});


Route::group([
    'prefix'=>'employer',
    'middleware'=>'auth:employer',
],function(){
    Route::get('/', [ProfileController::class, 'index'])->name('employer.index');
    Route::put('/{employer}/update', [ProfileController::class, 'updateProfile'])->name('employer.profile.update');
    Route::get('/post_job', [PostJobController::class, 'index'])->name('employer.post_job');
    
} );

Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
