<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\Admin\MerchandiseController as AdminMerchandiseController;
use Illuminate\Support\Facades\Route;
use App\Models\ContactMessage;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\PesertaDashboardController;
use App\Http\Controllers\CoachDashboardController;

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'subjek' => 'required',
        'pesan' => 'required',
    ]);
    $validated['is_read'] = false;
    ContactMessage::create($validated);
    return back()->with('success', 'Pesan Anda berhasil dikirim!');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/jadwal-latihan', [JadwalLatihanController::class, 'index'])->name('jadwal.latihan');
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{event:slug}', [EventController::class, 'show'])->name('event.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $totalJadwalLatihan = \App\Models\JadwalLatihan::count();
        return view('admin.dashboard', compact('totalJadwalLatihan'));
    })->name('admin.dashboard');

    // User Management Routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/admin/jadwal-latihan', [JadwalLatihanController::class, 'adminIndex'])->name('admin.jadwal_latihan.index');
    Route::get('/admin/jadwal-latihan/create', [JadwalLatihanController::class, 'create'])->name('admin.jadwal_latihan.create');
    Route::post('/admin/jadwal-latihan', [JadwalLatihanController::class, 'store'])->name('admin.jadwal_latihan.store');
    Route::get('/admin/jadwal-latihan/{id}/edit', [JadwalLatihanController::class, 'edit'])->name('admin.jadwal_latihan.edit');
    Route::put('/admin/jadwal-latihan/{id}', [JadwalLatihanController::class, 'update'])->name('admin.jadwal_latihan.update');
    Route::delete('/admin/jadwal-latihan/{id}', [JadwalLatihanController::class, 'destroy'])->name('admin.jadwal_latihan.destroy');

    Route::get('/admin/pesan-masuk', [ContactMessageController::class, 'index'])->name('admin.contact_messages.index');
    Route::get('/admin/pesan-masuk/{id}', [ContactMessageController::class, 'show'])->name('admin.contact_messages.show');
    Route::delete('/admin/pesan-masuk/{id}', [ContactMessageController::class, 'destroy'])->name('admin.contact_messages.destroy');

    Route::get('/admin/events', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/events/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [\App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{id}/edit', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/admin/events/{id}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{id}', [\App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('admin.events.destroy');

    Route::get('/admin/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri.index');
    Route::get('/admin/galeri/create', [AdminGaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/admin/galeri', [AdminGaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/admin/galeri/{id}/edit', [AdminGaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/admin/galeri/{id}', [AdminGaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // Merchandise Management Routes
    Route::resource('admin/merchandise', AdminMerchandiseController::class, ['as' => 'admin']);
});

// Fallback for unauthorized access to admin dashboard
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

// User authentication routes (Peserta and Coach)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Peserta Dashboard Routes
Route::middleware(['auth', 'role:peserta'])->group(function () {
    Route::get('/dashboard/peserta', [PesertaDashboardController::class, 'index'])->name('peserta.dashboard');
});

// Coach Dashboard Routes
Route::middleware(['auth', 'role:coach'])->group(function () {
    Route::get('/dashboard/coach', [CoachDashboardController::class, 'index'])->name('coach.dashboard');
});
