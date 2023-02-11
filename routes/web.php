<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('layouts.index');
// });

// Auth::routes();
Route::get('/login', [LoginController::class, 'indexHalaman'])->name('authLogin');
Route::post('/login', [LoginController::class, 'login'])->name('authLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register-user', [RegisterController::class, 'index'])->name('authRegister.user');
Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('authRegister.user');


Route::get('/', [PerumahanController::class, 'index'])->name('index');
Route::get('/about', [PerumahanController::class, 'about'])->name('about');
Route::get('/property-single', [PerumahanController::class, 'propertySingle'])->name('property_single');
Route::get('/property-grid', [PerumahanController::class, 'propertyGrid'])->name('property_grid');
Route::get('/agent-single', [PerumahanController::class, 'agentSingle'])->name('agent_single');
Route::get('/agents-grid', [PerumahanController::class, 'agentGrid'])->name('agent_grid');
Route::get('/blog-single', [PerumahanController::class, 'blogSingle'])->name('blog_single');
Route::get('/blog-grid', [PerumahanController::class, 'blogGrid'])->name('blog_grid');
Route::get('/contact', [PerumahanController::class, 'contact'])->name('contact');

Route::group(['prefix'=>'admin', 'middleware'=>['Admin','auth']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
    Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('admin.store');
});





