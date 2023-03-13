<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReplyController;
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

Route::get('/', [TopicController::class, 'index'])->name('root');

Route::resource('users', UserController::class)->only('show', 'update', 'edit');
Route::resource('topics', TopicController::class)->only('index', 'create', 'store', 'update', 'edit', 'destroy');
Route::resource('categories', CategoryController::class)->only('show');

Route::get('topics/{topic}/{slug?}', [TopicController::class, 'show'])->name('topics.show');
Route::post('upload_image', [TopicController::class, 'uploadImage'])->name('topics.upload_image');

Route::resource('replies', ReplyController::class)->only('store', 'destroy');
Route::resource('notifications', NotificationController::class)->only('index');

require __DIR__ . '/auth.php';
