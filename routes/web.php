<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AdminController;
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

// Auth::routes();
Route::get('/login', [LoginController::class, 'indexHalaman'])->name('authLogin');
Route::post('/login', [LoginController::class, 'login'])->name('authLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register-user', [RegisterController::class, 'index'])->name('authRegister.user');
Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('authRegister.user');

Route::get('/', [PerumahanController::class, 'index'])->name('index');
Route::get('/about', [PerumahanController::class, 'about'])->name('about');
Route::get('/property-single/{id}', [PerumahanController::class, 'propertySingle'])->name('property_single');
Route::get('/property-grid', [PerumahanController::class, 'propertyGrid'])->name('property_grid');
Route::get('/agent-single/{id}', [PerumahanController::class, 'agentSingle'])->name('agent_single');
Route::get('/agents-grid', [PerumahanController::class, 'agentGrid'])->name('agent_grid');
Route::get('/blog-single', [PerumahanController::class, 'blogSingle'])->name('blog_single');
Route::get('/blog-grid', [PerumahanController::class, 'blogGrid'])->name('blog_grid');
Route::get('/contact', [PerumahanController::class, 'contact'])->name('contact');

Route::group(['prefix'=>'admin', 'middleware'=>['Admin','auth']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
    Route::get('/home-getdata', [App\Http\Controllers\HomeController::class, 'getDataProperties'])->name('admin.getdata.properties');
    Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('admin.create');
    Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('admin.update');
    Route::get('/terjual/{id}', [App\Http\Controllers\HomeController::class, 'propertyTerjual'])->name('admin.property.terjual');
    Route::get('/tertolak/{id}', [App\Http\Controllers\HomeController::class, 'propertyDitolak'])->name('admin.property.ditolak');

    Route::get('/agent', [App\Http\Controllers\AgentController::class, 'index'])->name('admin.agent.index');
    Route::get('/agent/create', [App\Http\Controllers\AgentController::class, 'create'])->name('admin.agent.create');
    Route::post('/agent/store', [App\Http\Controllers\AgentController::class, 'store'])->name('admin.agent.store');
    Route::get('/agent/edit/{id}', [App\Http\Controllers\AgentController::class, 'edit'])->name('admin.agent.edit');
    Route::post('/agent/update/{id}',[App\Http\Controllers\AgentController::class, 'update'])->name('admin.agent.update');
    Route::get('/agent/delete/{id}',[App\Http\Controllers\AgentController::class, 'delete'])->name('admin.agent.delete');

    Route::get('/pesan', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.pesan.index');
    Route::get('/pesan/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.pesan.show');
    Route::post('/pesan', [App\Http\Controllers\AdminController::class, 'sendPesan'])->name('admin.sendPesan');

    Route::get('/booking', [App\Http\Controllers\AdminController::class, 'booking'])->name('admin.booking.index');
    Route::get('/get-data-booking', [App\Http\Controllers\AdminController::class, 'getDataBooking'])->name('admin.getdata.booking');

});

Route::group(['prefix'=>'user', 'middleware'=>['User','auth']], function(){
    Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::post('/pesan', [App\Http\Controllers\UserController::class, 'sendPesan'])->name('user.sendPesan');

    Route::post('/order-confirmation/{id}', [App\Http\Controllers\UserController::class, 'orderConfirmation'])->name('user.orderConfirmation');
});







