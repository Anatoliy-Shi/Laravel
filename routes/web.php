<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Account\IndexController as AccountController;

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

Route::get('/', function () {
    return view('welcome');
});


//news routes

//admin
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/account/logout', function() {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> 'admin'], function() {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/user', AdminUsersController::class);

});
});


Route::get('/newslist', [NewsController::class, 'index'])
	->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('news', '\d+')
	->name('news.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
