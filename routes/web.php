<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AttendController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RegisteredController;
use App\Http\Controllers\Visitor\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function(){
    return redirect()->route('welcome');
});


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register','index')->name('welcome');
    Route::post('/register','store')->name('register');
    Route::get('/badge/{code}', 'badge')->name('badge');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('login','index')->name('login.index');
    Route::post('login','login')->name('login');
});


Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('home',[HomeController::class,'index'])->name('home');
    Route::get('filter-chart/{day}',[HomeController::class,'filterChart'])->name('chart.filter');
    
    
    Route::controller(RegisteredController::class)->middleware(['can:Registered Details'])->group(function () {
        Route::get('registered','index')->name('registered.index');
        Route::get('registered/{registered}','edit')->name('registered.edit');
        Route::post('registered/{registered}','update')->name('registered.update');
        Route::delete('registered/{registered}','destory')->name('registered.destroy');
    });

    Route::controller(AttendController::class)->group(function () {
        Route::get('attend/{type}-print','storeByQrcodeView')->name('attend.store_by_qrcode_view');
        Route::post('attend/{type}-print','storeByQrcode')->name('attend.store_by_qrcode');
        Route::get('attend/{registered}','store')->name('attend.store');
        Route::get('attenders-in-day/{day}','attendersPerDay')->name('attenders.day');
        Route::get('export-attenders-in-day/{day}','exportAttendersPerDay')->name('exportAttenders.day');
        Route::delete('attend/{registered}','destroy')->name('attend.destory');
    });
    
    Route::controller(SettingController::class)->middleware(['can:Settings'])->group(function () {
        Route::get('settings','index')->name('settings.index');
        Route::post('settings','store')->name('settings.store');
    });

    Route::controller(UserController::class)->middleware(['can:Users'])->group(function () {
        Route::get('users','index')->name('users.index');
        Route::get('add-new-user','newUser')->name('users.new');
        Route::post('add-new-user','store')->name('users.store');
        Route::get('user/{user}','edit')->name('users.edit');
        Route::post('user/{user}','update')->name('users.update');
        Route::delete('user/{user}','destroy')->name('users.destory');
    });
    

    Route::post('login',[AuthController::class,'logout'])->name('logout');
});
