<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\JobseekerController;
use App\Http\Controllers\Employer\Auth\LoginController as EmployerLoginController;
use App\Http\Controllers\Employer\Auth\RegisterController as EmployerRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\Employer\PostJobController;
use App\Http\Controllers\Employer\ManageJobController;
use App\Http\Controllers\Employer\ManageJobSeekerController;
use App\Http\Controllers\JobSeeker\ApplicationController;
use App\Http\Controllers\JobSeeker\ProfileJobSeekerController;
use App\Http\Controllers\JobSeeker\JobApplyController;
use App\Http\Controllers\JobSeeker\FavoriteJobController;
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

Route::get('/login', function () {
    return view('admin.auth.login');
});

Route::get('/create', function () {
    return view('admin.blog.create');
});


Route::group([
    'prefix'    => 'admin',
    'namespace' => 'Admin\Auth',
], function () {
    Route::get('/logina', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.index');
    Route::post('/logina', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logouta', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::group([
    'prefix'=>'admin',
    'middleware'=>'auth:admin',
],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/manage_employer', [EmployerController::class, 'index'])->name('manage_employer');
Route::get('/manage_jobseeker', [JobseekerController::class, 'index'])->name('manage_jobseeker');
Auth::routes();
} );

Route::group([
    'prefix'    => 'employer',
    'namespace' => 'Employer\Auth',
], function () {
    Route::get('/register', [EmployerRegisterController::class, 'showRegistrationForm'])->name('employer.register.index');
    Route::post('/register', [EmployerRegisterController::class, 'register'])->name('employer.register');
    Route::get('/login', [EmployerLoginController::class, 'showLoginForm'])->name('employer.login.index');
    Route::post('/login', [EmployerLoginController::class, 'login'])->name('employer.login');
    Route::post('/logout', [EmployerLoginController::class, 'logout'])->name('employer.logout');
});


Route::group([
    'prefix'=>'employer',
    'middleware'=>'auth:employer',
],function(){
    Route::get('/', [ProfileController::class, 'index'])->name('employer.index');
    Route::put('/{employer}/update', [ProfileController::class, 'updateProfile'])->name('employer.profile.update');
    Route::get('/change_password', [ProfileController::class, 'showChangePasswordForm'])->name('employer.show_change_password');
    Route::put('/change_password/{employer}', [ProfileController::class, 'changePassword'])->name('employer.change_password');
    Route::get('/post_job', [PostJobController::class, 'index'])->name('employer.post_job');
    Route::post('/post_job', [PostJobController::class, 'store'])->name('employer.store');
    Route::get('/manage_job', [ManageJobController::class, 'index'])->name('employer.manage_job');
    Route::put('manage_job/{job}', [ManageJobController::class, 'update'])->name('employer.update_job');
    Route::delete('manage_job/{job}', [ManageJobController::class, 'destroy'])->name('employer.destroy_job');
    Route::get('/manage_jobseeker', [ManageJobSeekerController::class, 'index'])->name('employer.manage_jobseeker');
    Route::put('/update_status', [ManageJobSeekerController::class, 'updateStatus'])->name('employer.update_status');

} );


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{job}/detail',[HomeController::class, 'jobDetail'])->name('detail');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
Route::get('/category/{category}', [HomeController::class, 'jobsByCategory'])->name('jobsbycategory');
Route::get('/viewcv/{application}', [HomeController::class, 'viewCV'])->name('view_cv');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/blog', [HomeController::class, 'getArticles'])->name('blog');
Route::get('/blog/{article}', [HomeController::class, 'detailBlog'])->name('detailblog');


Route::group([
    'prefix'    => 'jobseeker',
    'namespace' => 'Auth',
], function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group([
    'prefix'=>'jobseeker',
    'middleware'=>'auth:web',
],function(){
    Route::post('/apply/{job}', [ApplicationController::class, 'apply'])->name('user.apply');
    Route::get('/', [ProfileJobSeekerController::class, 'index'])->name('user.profile');
    Route::put('/{user}/update', [ProfileJobSeekerController::class, 'update'])->name('user.update');
    Route::get('/job_apply', [JobApplyController::class, 'index'])->name('user.job_apply');
    Route::get('{application}/viewCV', [JobApplyController::class, 'viewCV'])->name('user.viewCV');
    Route::post('/favorite_job/{job}', [FavoriteJobController::class, 'saveJob'])->name('user.savejob');
    Route::get('/favorite_job', [FavoriteJobController::class, 'index'])->name('user.favoritejob');
    Route::delete('favorite_job/{favoriteJob}', [FavoriteJobController::class, 'deleteFavoriteJob'])->name('user.delete_favoritejob');
    Route::get('/change_password', [ProfileJobSeekerController::class, 'showChangePasswordForm'])->name('user.show_change_password');
    Route::put('/change_password/{user}', [ProfileJobSeekerController::class, 'changePassword'])->name('user.change_password');
});

