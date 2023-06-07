<?php

use App\Http\Livewire\Admin\Home as AdminHome;
use App\Http\Livewire\Base\Login;
use App\Http\Livewire\Admin\Jemaat;
use App\Http\Livewire\Base\Contact;
use App\Http\Livewire\Base\HomePage;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\IbadahPage;
use App\Http\Livewire\Admin\JadwalPage;
use App\Http\Livewire\Admin\TambahPeran;
use App\Http\Livewire\Base\IbadahDetail;
use App\Http\Livewire\Admin\JadwalDetail;
use App\Http\Livewire\Admin\TambahAnggota;
use App\Http\Livewire\Admin\Konsultasi as AdminKonsultasi;

Route::get('/', HomePage::class)->name('home-page');
Route::get('/login', Login::class)->name('login');
Route::get('/kontak', Contact::class)->name('kontak');
Route::get('/ibadah/{ibadah_id}', IbadahDetail::class)->name('ibadah');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home-page'); 
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/home', AdminHome::class)->name('admin.home');
        Route::get('/tambah-anggota', TambahAnggota::class)->name('admin.tambah-anggota');
        Route::get('/tambah-peran', TambahPeran::class)->name('admin.tambah-peran');
        Route::get('/jemaat', Jemaat::class)->name('admin.jemaat');
        Route::get('/atur-ibadah', IbadahPage::class)->name('admin.atur-ibadah');
        Route::get('/atur-jadwal', JadwalPage::class)->name('admin.atur-jadwal');
        Route::get('/jadwal/{generate_id}', JadwalDetail::class)->name('admin.jadwal-detail');
        Route::get('/pesan', AdminKonsultasi::class)->name('admin.pesan');
    });
});