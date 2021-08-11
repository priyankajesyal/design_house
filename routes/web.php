<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ManualController;
use App\Http\Controllers\Admin\ProposalController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BankDetailController;
use App\Http\Controllers\Admin\AdminProposalController;

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
Route::get('/', function (){
    return redirect('admin/login');
});
Route::get('admin', function () {
    return redirect('admin/login');
});

Route::get('admin/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function () {
    // Admin Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('portfolio', PortfolioController::class);
    Route::post('imageDelete', [PortfolioController::class, 'imagedelete'])->name('imageDelete');
    Route::resource('proposal', ProposalController::class);
    Route::resource('bank-details', BankDetailController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('users', UserController::class);
    Route::resource('milestone', MilestoneController::class);
    Route::resource('manualpayment', ManualController::class);
    Route::resource('adminproposal', AdminProposalController::class);
});