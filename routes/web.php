<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RegisterController;


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
// Login Controller
Route::get('/', [LoginController::class, 'index'])
    ->name('login');

Route::post('/', [LoginController::class, 'login']);

Route::get('/home', [LoginController::class, 'home'])
    ->name('home')
    ->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');


// Register Controller
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);


// Profile Controller
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->middleware('auth');


// About Controller
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');


