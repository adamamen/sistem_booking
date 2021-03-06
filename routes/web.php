<?php

use App\Http\Controllers\Antriancontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Bookingcontroller;
use App\Http\Controllers\Bukticontroller;
use App\Http\Controllers\Indexcontroller;
use App\Http\Controllers\Pasiencontroller;
use App\Http\Controllers\Swabcontroller;
use App\Models\Pasien;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/antrian', [Antriancontroller::class, 'index'])->name('antrian.index');
    Route::post('/antrian/post', [Antriancontroller::class, 'post'])->name('antrian.post');
    Route::post('/antrian/open', [Antriancontroller::class, 'open'])->name('antrian.open');

    Route::resource('pasien', Pasiencontroller::class);
    Route::resource('booking', Bookingcontroller::class);
    Route::resource('swab', Swabcontroller::class);

    Route::post('get/edit/pasien', [Pasiencontroller::class, 'get_edit'])->name('get.edit.pasien');
    Route::post('get/edit/booking', [Bookingcontroller::class, 'get_edit'])->name('get.edit.booking');
    Route::post('get/edit/swab', [Swabcontroller::class, 'get_edit'])->name('get.edit.swab');

    Route::post('src/booking', [Bookingcontroller::class, 'src_booking'])->name('src.book');

    Route::get('bukti/admin/index', [Bukticontroller::class, 'index'])->name('buktia.index');
    Route::post('bukti/admin/post', [Bukticontroller::class, 'post'])->name('buktia.post');
    Route::get('bukti/admin/notsccs', [Bukticontroller::class, 'not_sccs'])->name('buktia.notsccs');

    Route::get('/logout/admin', function () {
        Auth::guard('web')->logout();
        return redirect()->route('login.admin.index');
    })->name('logout.web');
});

Route::get('/login/admin', [Authcontroller::class, 'index_login_admin'])->name('login.admin.index');
Route::post('/login/admin/post', [Authcontroller::class, 'login_web_post'])->name('post.login.web');


//FRONT
Route::get('/register', [Indexcontroller::class, 'register_index'])->name('register.index');
Route::post('/register/post', [Authcontroller::class, 'post_register'])->name('register.post');

Route::get('/login', [Indexcontroller::class, 'login_index'])->name('login.index');
Route::post('/login/post', [Authcontroller::class, 'post_login'])->name('login.post');

Route::get('/tentang', function () {
    return view('front.tentang');
})->name('tentang');

Route::middleware(['auth:client'])->group(function () {
    Route::get('/logout', function () {
        Auth::guard('client')->logout();
        return redirect()->route('index');
    })->name('logout');

    Route::get('/bookings', [Indexcontroller::class, 'booking_index'])->name('bookingc.index');
    Route::post('/bookings/post', [Indexcontroller::class, 'booking_post'])->name('bookingc.post');

    Route::get('/antrians', [Indexcontroller::class, 'antrian_index'])->name('antrianc.index');
    Route::get('/antrians/data', [Indexcontroller::class, 'antrian_data'])->name('antrianc.data');
    Route::get('/hasil', [Indexcontroller::class, 'hasil_index'])->name('hasilc.index');

    Route::get('/get/notif', [Indexcontroller::class, 'get_notif'])->name('get.notif');
    Route::get('/get/notifj', [Indexcontroller::class, 'get_notifj'])->name('get.notifj');
    Route::get('/delete/notif', [Indexcontroller::class, 'delete_notif'])->name('delete.notif');

    Route::get('/upload_bukti', [Indexcontroller::class, 'bukti_index'])->name('bukti.index');
    Route::post('/upload_bukti/post', [Indexcontroller::class, 'post_bukti'])->name('bukti.post');
});

Route::get('/', [Indexcontroller::class, 'index'])->name('index');
