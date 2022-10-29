<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\dataController;

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
    return redirect()->route('login');
});

Route::get('home', function () {
    return redirect()->route('login');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function() {
  Auth::routes();
});

Route::group(['prefix'=>'user','middleware'=>['is_user','auth','PreventBackHistory']], function(){
  Route::get('/', [App\Http\Controllers\dataController::class, 'index'])->name('Dashboard | Home');
  Route::get('/home', [App\Http\Controllers\dataController::class, 'index'])->name('Dashboard | Home');
  Route::get('/news', [App\Http\Controllers\dataController::class, 'index'])->name('Dashboard | Home');
  Route::put('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('Dashboard | Update Profile');
  //Route::get('/home', [App\Http\Controllers\dataController::class, 'viewNews'])->name('Dashboard | News');
  Route::get('/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('Dashboard | User Profile');
  Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'ChangePassword']);
  Route::get('/view-news/{id}', [App\Http\Controllers\dataController::class, 'viewNews'])->name('Dashboard | Read News');
  Route::get('/news-{id}', [App\Http\Controllers\dataController::class, 'viewNews'])->name('Dashboard | View News');
  Route::get('/messages', [App\Http\Controllers\MsgController::class, 'index'])->name('Dashboard | Messages');
  Route::get('/messages/{id}', [App\Http\Controllers\MsgController::class, 'store']);
});

Route::group(['prefix'=>'admin','middleware'=>['is_admin','auth','PreventBackHistory']], function(){
  Route::get('/', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('Dashboard | Admin');
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('Dashboard | Admin');
  Route::get('/profile', [App\Http\Controllers\HomeController::class, 'adminProfile'])->name('Dashboard | Admin Profile');
  Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'ChangePassword']);
  Route::get('/news', [App\Http\Controllers\dataController::class, 'index'])->name('Dashboard | News');
  Route::get('/add-news', [App\Http\Controllers\dataController::class, 'addNews'])->name('Dashboard | Add News');
  Route::get('/news-{id}', [App\Http\Controllers\dataController::class, 'viewNews'])->name('Dashboard | View News');
  Route::post('/add-news-action', [App\Http\Controllers\dataController::class, 'store']);
  Route::get('/delete-news/{id}', [App\Http\Controllers\dataController::class, 'destroyNews'])->name('Dashboard | Delete News');
  Route::put('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('Dashboard | Update Profile');
  Route::put('/update-profile-picture/{id}', [App\Http\Controllers\HomeController::class, 'updateProfilePicture'])->name('Dashboard | Update Profile Picture');
  Route::get('/view-profile/{id}', [App\Http\Controllers\HomeController::class, 'adminViewProfile'])->name('Dashboard | View Profile');
  Route::get('/delete-user/{id}', [App\Http\Controllers\HomeController::class, 'destroyUser'])->name('Dashboard | Delete User');
  Route::get('/messages', [App\Http\Controllers\MsgController::class, 'index'])->name('Dashboard | Messages');
  Route::post('/send-messages', [App\Http\Controllers\MsgController::class, 'store']);
  Route::get('/email-me', [App\Http\Controllers\dataController::class, 'emailMe']);
  Route::get('/download/{id}', [App\Http\Controllers\dataController::class, 'download']);
});
