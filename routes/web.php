<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [PageController::class, 'root'])->name('root');

Route::resource('users', UserController::class)->only('show', 'update', 'edit');
Route::resource('topics', TopicController::class);
Route::resource('categories', CategoryController::class)->only('show');

Route::post('upload_image', [TopicController::class, 'uploadImage'])->name('topics.upload_image');

require __DIR__ . '/auth.php';
