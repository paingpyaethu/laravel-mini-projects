<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware(['auth','IsBanned'])->group(function (){
   Route::get('/home', 'HomeController@index')->name('home');


   Route::middleware('AdminOnly')->group(function (){
      Route::get('/user-manager', 'UserManagerController@index')->name('user-manager.index');
      Route::post('/make-admin','UserManagerController@makeAdmin')->name('user-manager.makeAdmin');
      Route::post('/ban-user','UserManagerController@banUser')->name('user-manager.banUser');
      Route::post('/unbanned-user','UserManagerController@unBanUser')->name('user-manager.unBanUser');
   });

   Route::prefix('profile')->group(function(){
      // Main Frame Route
      Route::get('/','ProfileController@profile')->name('profile');
      Route::get('/edit-photo','ProfileController@editPhoto')->name('profile.edit.photo');
      Route::get('/edit-password','ProfileController@editPassword')->name('profile.edit.password');
      Route::get('/edit-name-and-email','ProfileController@editNameEmail')->name('profile.edit.name.email');
      Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
      Route::post('/change-name','ProfileController@changeName')->name('profile.changeName');
      Route::post('/change-email','ProfileController@changeEmail')->name('profile.changeEmail');
      Route::post('/change-photo','ProfileController@changePhoto')->name('profile.changePhoto');
      Route::post('/change-phone','ProfileController@changePhone')->name('profile.changePhone');
      Route::post('/change-address','ProfileController@changeAddress')->name('profile.changeAddress');
      Route::post("/update-user-info","ProfileController@updateInfo")->name("profile.update.info");
   });
});


