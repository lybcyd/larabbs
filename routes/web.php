<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
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

require __DIR__ . '/auth.php';
