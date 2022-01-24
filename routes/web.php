<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/template', [App\Http\Controllers\HomeController::class, 'template'])->name('template');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return redirect()->route('dashboard.index');
    });

    Route::post('database/change', function (Request $request) {
        $data = $request->all();

        \Session::put('tahun', $request->database_tahun);

        return redirect(url($request->current_url))->withErrors(['Tahun Database Berhasil Dirubah']);
    })->name('database.change');

    Route::get('home', function () {
        return redirect()->route('dashboard.index');
    });
    Route::post('themeChange', [App\Http\Controllers\HomeController::class, 'themeChange'])->name('theme.change');
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard.index');
    Route::get('dashboard/chart', [App\Http\Controllers\HomeController::class, 'chart'])->name('dashboard.chart');

    Route::get('search', [App\Http\Controllers\ArsipController::class, 'search'])->name('arsip.search');
    Route::get('arsip/unduh/{kd_arsip}', [App\Http\Controllers\ArsipController::class, 'unduh'])->name('arsip.unduh');
    Route::resource('arsip', App\Http\Controllers\ArsipController::class);
    Route::resource('tipe-arsip', App\Http\Controllers\TipeArsipController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);

});
