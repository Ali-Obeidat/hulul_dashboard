<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerEmailController;
use App\Http\Controllers\UserAccountsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\MtHululController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RealAccountsController;
use App\Models\UserAccounts;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('/users', UserController::class)->middleware('auth');
Route::get('/showCompanyUsers', [UserController::class, 'showCompanyUsers'])->middleware('auth')->name('CompanyUsers');
Route::resource('/Managers', ManagerController::class)->middleware('auth');
Route::resource('/UsersRequests', UserAccountsController::class)->middleware('auth');
Route::resource('/UsersAccounts', MtHululController::class)->middleware('auth');
Route::get('/allUserAccounts', [UserAccountsController::class, 'showUserAccounts'])->middleware('auth')->name('allUserAccounts');
Route::resource('/usersDocuments', DocumentController::class)->middleware('auth');
Route::resource('/ManagerEmails', ManagerEmailController::class)->middleware('auth');
Route::resource('/bonus', BonusController::class)->middleware('auth');
Route::post('/ManagerEmails/send/{id}', [ManagerEmailController::class, 'sendEmail'])->middleware('auth')->name('sendEmail');
Route::resource('/news', NewsController::class)->middleware('auth');

Route::get('Real-account-request',[RealAccountsController::class,'showAllRequest'])->middleware('auth')->name('showAllRequest');
Route::get('accept-Real-account',[RealAccountsController::class,'accept'])->middleware('auth')->name('accept');
// Route::get('/UsersRequests/filter', [UserAccountsController::class,'DepositWithdrawFilter'])->name('DepositWithdrawFilter');
