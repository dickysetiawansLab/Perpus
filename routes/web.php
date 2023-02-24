 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Admin;
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
    return view('index');
})->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'signup']);

Route::get('/buku', [BukuController::class, 'index'])->middleware('auth');
Route::get('/buku/tambah', [BukuController::class, 'tambah'])->middleware('auth');
Route::post('/buku/tambah', [BukuController::class, 'store'])->middleware('auth', 'admin');
Route::get('/buku/edit{id?}', [BukuController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/buku/edit{id?}', [BukuController::class, 'update'])->middleware('auth', 'admin');
Route::get('/buku/delete{id?}', [BukuController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/user/{username}', [UserController::class, 'index'])->middleware('auth');
Route::post('/user/{username}', [UserController::class, 'edit'])->middleware('auth');


Route::get('/data/anggota', [AdminController::class, 'data_anggota'])->middleware('auth', 'admin');
Route::get('/data/anggota/tambah', [AdminController::class, 'tambah_anggota'])->middleware('auth', 'admin');
Route::post('/data/anggota/tambah', [AdminController::class, 'store_anggota'])->middleware('auth', 'admin');
Route::get('/data/anggota/delete{id?}', [AdminController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/data/admin', [AdminController::class, 'data_admin'])->middleware('auth', 'admin');


Route::get('/data/penerbit', [PenerbitController::class, 'index'])->middleware('auth', 'admin');
Route::get('/data/penerbit/tambah', [PenerbitController::class, 'tambah'])->middleware('auth', 'admin');
Route::post('/data/penerbit/tambah', [PenerbitController::class, 'store'])->middleware('auth', 'admin');
Route::get('/data/penerbit/edit{id?}', [PenerbitController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/data/penerbit/edit{id?}', [PenerbitController::class, 'update'])->middleware('auth', 'admin');
Route::get('/data/penerbit/delete{id?}', [PenerbitController::class, 'destroy'])->middleware('auth', 'admin');


Route::get('/data/kategori', [KategoriController::class, 'index'])->middleware('auth', 'admin');
Route::get('/data/kategori/tambah', [KategoriController::class, 'tambah'])->middleware('auth', 'admin');
Route::post('/data/kategori/tambah', [KategoriController::class, 'store'])->middleware('auth', 'admin');
Route::get('/data/kategori/edit{id?}', [KategoriController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/data/kategori/edit{id?}', [KategoriController::class, 'update'])->middleware('auth', 'admin');
Route::get('/data/kategori/delete{id?}', [KategoriController::class, 'destroy'])->middleware('auth', 'admin');

Route::get('/data-peminjam', [PeminjamController::class, 'index'])->middleware('auth', 'admin');
Route::get('/data-peminjam/tambah-peminjam', [PeminjamController::class, 'tambah'])->middleware('auth', 'admin');
Route::post('/data-peminjam/tambah-peminjam', [PeminjamController::class, 'store'])->middleware('auth', 'admin');
Route::get('/data-peminjam/edit{id?}', [PeminjamController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/data-peminjam/edit{id?}', [PeminjamController::class, 'update'])->middleware('auth', 'admin');
Route::get('/data-peminjam/delete{id?}', [PeminjamController::class, 'destroy'])->middleware('auth', 'admin');

Route::post('/logout', [LoginController::class, 'logout']);

