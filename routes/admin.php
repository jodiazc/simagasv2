<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PaymentLinkController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\ApiPaymentLinkController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::get('',[HomeController::class,'index'])->name('admin.home');
Route::resource('payments', PaymentLinkController::class)->names([
    'index' => 'admin.payments.index',
    'create' => 'admin.payments.create',
    'store' => 'admin.payments.store',
    'show' => 'admin.payments.show',
    'edit' => 'admin.payments.edit',
    'update' => 'admin.payments.update',
    'destroy' => 'admin.payments.destroy',
]);

Route::resource('users',UserController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('roles',RoleController::class)->names('admin.roles');

Route::post('payments/import', [ImportController::class, 'import'])->name('admin.payments.import');
//Route::get('payments/export', [ExportController::class, 'exportCsv'])->name('admin.payments.export');

Route::prefix('admin')->group(function () {
    Route::get('/payments/export', [ExportController::class, 'exportCsv'])->name('admin.payments.export');
});

//Route::get('payments/apiview', [ApiPaymentLinkController::class, 'fetchExternalData'])->name('admin.payments.apiview');
Route::get('/api',[ApiPaymentLinkController::class,'fetchExternalData'])->name('admin.payments.apiview');
Route::get('/api',[ApiPaymentLinkController::class,'makePayment'])->name('admin.payments.apiview');

//Route::get('payments/export', [ExportController::class, 'exportCsv'])->name('admin.payments.export');

//Roles





//https://www.youtube.com/watch?v=85B7DsT75Y4 Video para implementar los roles
