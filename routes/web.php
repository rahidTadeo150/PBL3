<?php

use App\Http\Controllers\AdminPanel;
use App\Http\Controllers\WebsitePanel;
use App\Http\Controllers\AuthorizationAdmin;
use App\Http\Controllers\Beasiswa;
use App\Http\Controllers\Lomba;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Instansi;
use App\Http\Controllers\PrestasiMahasiswa;

Route::redirect('/', '/landing-page');

Route::get('/login-admin', [AdminPanel::class, 'directToLogin'])->name('AdminLogin')->middleware('guest');
Route::post('/auth-admin', [AuthorizationAdmin::class, 'authentication'])->name('AdminLogin.Auth')->middleware('guest');

Route::get('/log-in', [AuthController::class, 'LoginMethod'])->name('Login.LoginMethod');
Route::get('/log-in-mahasiswa', [AuthController::class, 'LoginMahasiswa'])->name('Login.Mahasiswa');
Route::post('/authorization', [AuthController::class, 'Login'])->name('Login.Authentication');
Route::get('/landing-page', [AuthController::class, 'ShowLandingPage'])->name('Website.LandingPage');
Route::get('/daftar-beasiswa', [WebsitePanel::class, 'ShowListBeasiswa'])->name('Website.Beasiswa.Index');
Route::get('/lihat-beasiswa', [WebsitePanel::class, 'DetailBeasiswa'])->name('Website.Beasiswa.Detail');
Route::get('/daftar-lomba', [WebsitePanel::class, 'ShowListLomba'])->name('Website.Lomba.Index');
Route::get('/daftar-prestasi', [WebsitePanel::class, 'ShowListPrestasi'])->name('Website.Prestasi.Index');

Route::middleware('MahasiswaLogedIn')->group(function () {
    Route::get('/log-out-mahasiswa', [AuthController::class, 'Logout'])->name('Login.Logout');
    Route::get('/form-pengajuan-prestasi', [WebsitePanel::class, 'RequestPrestasi'])->name('Account.RequestPrestasi');
    Route::post('/sending-request-prestasi', [WebsitePanel::class, 'SendingRequestPrestasi'])->name('Account.SendingRequestPrestasi');
    Route::get('/lihat-lomba', [WebsitePanel::class, 'DetailLomba'])->name('Website.Lomba.Detail');
});

Route::middleware('AdminLogedIn')->group(function () {
    Route::get('/test-dashboard-admin', function () {
        return view('admin.test');
    });

    Route::post('/logout-account', [AuthorizationAdmin::class, 'logout'])->name('AdminLogin.Logout');

    Route::get('/dashboard-admin', [AdminPanel::class, 'directToDashboard'])->name('Dashboard.Index');
    Route::get('/notification-request', [AdminPanel::class, 'directToIndexNotification'])->name('Dashboard.Notification');
    Route::get('/detail-notification', [AdminPanel::class, 'directToDetailNotification'])->name('Dashboard.Notification.Detail');
    Route::post('/accept-request', [AdminPanel::class, 'AcceptRequest'])->name('Dashboard.AcceptRequest');

    Route::get('/index-beasiswa', [Beasiswa::class, 'directToIndexBeasiswa'])->name('Beasiswa.Index');
    Route::get('/detail-beasiswa', [Beasiswa::class, 'directToDetailBeasiswa'])->name('Beasiswa.Detail');
    Route::get('/index-history-beasiswa', [Beasiswa::class, 'directToIndexHistoryBeasiswa'])->name('Beasiswa.History.Index');
    Route::get('/form-tambah-beasiswa', [Beasiswa::class, 'directToCreateBeasiswa'])->name('Beasiswa.Create');
    Route::post('/store-data-beasiswa', [Beasiswa::class, 'StoreDataBeasiswa'])->name('Beasiswa.Store');
    Route::delete('/delete-data-beasiswa', [Beasiswa::class, 'DeleteBeasiswa'])->name('Beasiswa.Delete');
    Route::get('/edit-data-beasiswa', [Beasiswa::class, 'EditBeasiswa'])->name('Beasiswa.Edit');
    Route::put('/updating-data-beasiswa', [Beasiswa::class, 'UpdateBeasiswa'])->name('Beasiswa.Update');
    Route::get('/restoring-data-beasiswa', [Beasiswa::class, 'RestoreBeasiswa'])->name('Beasiswa.Restore');

    Route::get('/select-instansi', [Instansi::class, 'SelectionInstansiBeasiswa'])->name('Instansi.Selection');
    Route::get('/index-instansi', [Instansi::class, 'directToIndex'])->name('Instansi.Index');
    Route::get('/form-instansi', [Instansi::class, 'directToCreateInstansiBeasiswa'])->name('Instansi.Create');
    Route::post('/store-data-instansi', [Instansi::class, 'StoreDataInstansi'])->name('Instansi.Store');
    Route::get('/edit-instansi', [Instansi::class, 'EditInstansi'])->name('Instansi.Edit');
    Route::put('/updating-instansi', [Instansi::class, 'UpdateInstansi'])->name('Instansi.Update');
    Route::delete('/delete-instansi', [Instansi::class, 'DeleteInstansi'])->name('Instansi.Delete');

    Route::get('/index-lomba', [Lomba::class, 'directToIndexLomba'])->name('Lomba.Index');
    Route::get('/index-history-lomba', [Lomba::class, 'directToIndexHistoryLomba'])->name('Lomba.HistoryData');
    Route::get('/form-tambah-lomba', [Lomba::class, 'directToCreateLomba'])->name('Lomba.Create');
    Route::post('/store-data-lomba', [Lomba::class, 'StoreDataLomba'])->name('Lomba.Store');
    Route::get('/detail-lomba', [Lomba::class, 'directToDetailLomba'])->name('Lomba.Detail');
    Route::get('/edit-data-lomba', [Lomba::class, 'EditLomba'])->name('Lomba.Edit');
    Route::put('/updating-data-lomba', [Lomba::class, 'UpdateLomba'])->name('Lomba.Update');
    Route::delete('/delete-data-lomba', [Lomba::class, 'DeleteLomba'])->name('Lomba.Delete');
    Route::get('/restoring-data-lomba', [Lomba::class, 'RestoreLomba'])->name('Lomba.Restore');

    Route::get('/index-prestasi', [PrestasiMahasiswa::class, 'directToIndexPrestasi'])->name('Prestasi.Index');
    Route::get('/index-history-prestasi', [PrestasiMahasiswa::class, 'directToIndexHistoryPrestasi'])->name('Prestasi.History');
    Route::get('/select-mahasiswa', [PrestasiMahasiswa::class, 'SelectionMahasiswa'])->name('Prestasi.MahasiswaSelect');
    Route::get('/form-tambah-prestasi', [PrestasiMahasiswa::class, 'directToCreatePrestasi'])->name('Prestasi.Create');
    Route::post('/store-data-prestasi', [PrestasiMahasiswa::class, 'StoreDataPrestasi'])->name('Prestasi.Store');
    Route::delete('/delete-data-prestasi', [PrestasiMahasiswa::class, 'DeletePrestasi'])->name('Prestasi.Delete');
    Route::get('/edit-data-prestasi', [PrestasiMahasiswa::class, 'EditPrestasi'])->name('Prestasi.Edit');
    Route::put('/updating-data-prestasi', [PrestasiMahasiswa::class, 'UpdatePrestasi'])->name('Prestasi.Update');
    Route::post('/updating-data-prestasi', [PrestasiMahasiswa::class, 'RestorePrestasi'])->name('Prestasi.Restore');

    Route::get('/detail-event', [AdminPanel::class, 'directToDetailEvent'])->name('DetailEvent');
});
