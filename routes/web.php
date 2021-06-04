<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Bookingcontroller;
use App\Http\Controllers\Indexcontroller;
use App\Http\Controllers\Pasiencontroller;
use App\Http\Controllers\Swabcontroller;
use App\Models\Pasien;
use App\Models\Booking;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth:web'])->group(function () {
    Route::get('/admin', [Indexcontroller::class, 'index_admin'])->name('index.admin');

    Route::resource('pasien', Pasiencontroller::class);
    Route::resource('booking', Bookingcontroller::class);
    Route::resource('swab', Swabcontroller::class);

    Route::post('get/edit/pasien', [Pasiencontroller::class, 'get_edit'])->name('get.edit.pasien');
    Route::post('get/edit/booking', [Bookingcontroller::class, 'get_edit'])->name('get.edit.booking');
    Route::post('get/edit/swab', [Swabcontroller::class, 'get_edit'])->name('get.edit.swab');

    Route::post('src/booking', [Bookingcontroller::class, 'src_booking'])->name('src.book');

    Route::get('/logout/admin', function () {
        Auth::guard('web')->logout();
        return redirect()->route('login.admin.index');
    })->name('logout.web');
});

Route::get('/login/admin', [Authcontroller::class, 'index_login_admin'])->name('login.admin.index');
Route::post('/login/admin/post', [Authcontroller::class, 'login_web_post'])->name('post.login.web');

Route::get('/', [Indexcontroller::class, 'index'])->name('index');
