<?php

use App\Http\Controllers\JobApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumController;

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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/forum', [PagesController::class, 'forum'])->name('forum');
Route::get('/job-detail/{id}', [PagesController::class, 'jobDetail'])->name('jobDetail');
Route::post('apply', [JobApplicationController::class, 'apply'])->name('jobapplication.apply');

Route::post('store', [ForumController::class, 'storeForumQuestion'])->name('forum.storeQuestion');
Route::get('/forum-detail/{id}', [PagesController::class, 'forumDetail'])->name('forumDetail');
Route::post('storeAnswer', [ForumController::class, 'storeForumAnswer'])->name('forum.storeAnswer');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('jobcategory', JobCategoryController::class);
    Route::resource('users', UsersController::class);
});

Route::get('jobapplication', [JobApplicationController::class, 'index'])->name('jobapplication.index');
Route::get('jobapplication/{applicationid}/edit', [JobApplicationController::class, 'edit'])->name('jobapplication.edit');
Route::put('update/{applicationid}', [JobApplicationController::class, 'update'])->name('jobapplication.update');
Route::post('download', [JobApplicationController::class, 'download_file'])->name('jobapplication.download');
Route::resource('jobs', JobController::class);

