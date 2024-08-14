<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\informasiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HimpunanController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\Tasks2Controller;
use App\Http\Controllers\Tasks3Controller;
use App\Http\Controllers\Proposals2Controller;
use App\Http\Controllers\PrestasiController;

// Definisi rute untuk otentikasi
Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login']);

// Grup rute yang memerlukan otentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/index/admin', [IndexController::class, 'admin'])
        ->middleware('userAkases:admin,mahasiswa,himpunan,wadek,kemahasiswaan')
        ->name('admin');

    Route::get('/index', [IndexController::class, 'index'])->name('index'); // Add this line

    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
    Route::get('/create', [IndexController::class, 'create'])->name('adminall.tambah');
    Route::post('/store', [IndexController::class, 'store'])->name('adminall.store');
    Route::get('/admin/edit-profile', [IndexController::class, 'editProfile'])->name('admin.editProfile');
    Route::post('/admin/update-profile', [IndexController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::get('/edit_pkm/{id}', [TaskController::class, 'edit'])->name('tasks.edit');


    Route::prefix('upload_proposal')->group(function () {
        // Add these route definitions to your routes file (e.g., web.php)

        Route::get('/proposals', [ProposalController::class, 'index'])->name('upload_proposal.index');
        Route::get('/proposaledit', [ProposalController::class, 'create'])->name('upload_proposal.create');
        Route::post('/proposals', [ProposalController::class, 'store'])->name('upload_proposal.store');
        Route::get('/proposals/{id}/edit', [ProposalController::class, 'edit'])->name('upload_proposal.edit');
        Route::put('/proposals/{id}', [ProposalController::class, 'update'])->name('upload_proposal.update');
        Route::delete('/proposals/{id}', [ProposalController::class, 'destroy'])->name('upload_proposal.destroy');
        Route::get('/proposals/{id}', [ProposalController::class, 'show'])->name('upload_proposal.show');
    });
    Route::prefix('upload_proposal_himpunan')->group(function () {
        // Add these route definitions to your routes file (e.g., web.php)

        Route::get('/proposals_himpunan', [Proposals2Controller::class, 'index'])->name('upload_proposal_himpunan.index');
        Route::get('/proposals_himpunan/create', [Proposals2Controller::class, 'create'])->name('upload_proposal_himpunan.create');
        Route::post('/proposals_himpunan', [Proposals2Controller::class, 'store'])->name('upload_proposal_himpunan.store');
        Route::get('/proposals_himpunan/{id}/edit', [Proposals2Controller::class, 'edit'])->name('upload_proposal_himpunan.edit');
        Route::put('/proposals_himpunan/{id}', [Proposals2Controller::class, 'update'])->name('upload_proposal_himpunan.update');
        Route::delete('/proposals_himpunan/{id}', [Proposals2Controller::class, 'destroy'])->name('upload_proposal_himpunan.destroy');
        Route::get('/proposals_himpunan/{id}', [Proposals2Controller::class, 'show'])->name('upload_proposal_himpunan.show');
    });


    Route::prefix('informasi')->group(function () {

        Route::post('/informasi', [InformasiController::class, 'store'])->name('informasi.store');
        Route::get('/informasi', [informasiController::class, 'informasi'])->name('informasi');
        Route::put('/informasi/{id}', 'App\Http\Controllers\informasiController@update')->name('informasi.update');
    });


    Route::prefix('tasks')->group(function () {
        // Route untuk menampilkan semua task
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

        // Route untuk menampilkan form untuk membuat task baru
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

        // Route untuk menyimpan task baru
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

        // Route untuk menampilkan form edit task

        // Route untuk memperbarui task
        Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

        // Route untuk menghapus task
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

        Route::get('/tasks/month/{month}', [TaskController::class, 'getTasksByMonth']);
    });
});
Route::prefix('tasks2')->group(function () {
    // Route untuk menampilkan semua task
    Route::get('/tasks2', [Tasks2Controller::class, 'index'])->name('tasks2.index');

    // Route untuk menampilkan form untuk membuat task baru
    Route::get('/tasks2/create', [Tasks2Controller::class, 'create'])->name('tasks2.create');

    // Route untuk menyimpan task baru
    Route::post('/tasks2', [Tasks2Controller::class, 'store'])->name('tasks2.store');

    // Route untuk menampilkan form edit task

    // Route untuk memperbarui task
    Route::put('/tasks2/{id}', [Tasks2Controller::class, 'update'])->name('tasks2.update');

    // Route untuk menghapus task
    Route::delete('/tasks2/{task}', [Tasks2Controller::class, 'destroy'])->name('tasks2.destroy');

    Route::get('/tasks2/month/{month}', [Tasks2Controller::class, 'getTasksByMonth']);
});
Route::prefix('tasks3')->group(function () {
    // Route untuk menampilkan semua task
    Route::get('/tasks3', [Tasks3Controller::class, 'index'])->name('tasks3.index');

    // Route untuk menampilkan form untuk membuat task baru
    Route::get('/tasks3/create', [Tasks3Controller::class, 'create'])->name('tasks3.create');

    // Route untuk menyimpan task baru
    Route::post('/tasks3', [Tasks3Controller::class, 'store'])->name('tasks3.store');

    // Route untuk menampilkan form edit task

    // Route untuk memperbarui task
    Route::put('/tasks3/{id}', [Tasks3Controller::class, 'update'])->name('tasks3.update');

    // Route untuk menghapus task
    Route::delete('/tasks3/{task}', [Tasks3Controller::class, 'destroy'])->name('tasks3.destroy');

    Route::get('/tasks3/month/{month}', [Tasks3Controller::class, 'getTasksByMonth']);
});


Route::prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'index'])->name('dosen.index');  // Correct the name here

    Route::post('/', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/{dosen}', [DosenController::class, 'show'])->name('dosens.show');

    Route::put('/{dosen}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/{dosen}', [DosenController::class, 'destroy'])->name('dosens.destroy');
});
Route::get('/{dosen}/edit', [DosenController::class, 'edit'])->name('dosens.edit');
Route::get('/tambah', [DosenController::class, 'create'])->name('dosen.create');

Route::prefix('mahasiswa')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index'); // List all Mahasiswa

    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); // Store new Mahasiswa (POST)
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->name('mahasiswa.show'); // Show specific Mahasiswa

    Route::put('/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // Update Mahasiswa (PUT)
    Route::delete('/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy'); // Delete Mahasiswa (DELETE)
});
Route::get('/edit/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit'); // Show form to edit Mahasiswa
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'create'])->name('mahasiswa.create'); // Show form to create Mahasiswa

Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
Route::get('/prestasi/{prestasi}', [PrestasiController::class, 'show'])->name('prestasi.show');
Route::get('/prestasi/{prestasi}', [PrestasiController::class, 'editprestasi'])->name('prestasi.edit');
Route::put('/prestasi/{prestasi}', [PrestasiController::class, 'update'])->name('prestasi.update');
Route::delete('/prestasi/{prestasi}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

Route::resource('faqs', FAQController::class);

Route::get('/himpunan', [HimpunanController::class, 'himpunan'])->name('himpunan');
Route::get('/himpunan_tasks', [HimpunanController::class, 'index'])->name('himpunantasks');


Route::fallback(function () {
    return view('login');
});
