<?php

use App\Http\Controllers\API\apiBonusController;
use App\Http\Controllers\API\apiChartsController;
use App\Http\Controllers\API\apiDeposit_WithdrawController;
use App\Http\Controllers\API\apiDocumentController;
use App\Http\Controllers\API\apiEmailController;
use App\Http\Controllers\API\apiManagerController;
use App\Http\Controllers\API\apiNewsController;
use App\Http\Controllers\API\apiRealAccountsController;
use App\Http\Controllers\API\apiUserAccountsController;
use App\Http\Controllers\API\apiUserController;
use App\Http\Controllers\UserAccountsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/UsersRequests/filter', [UserAccountsController::class,'DepositWithdrawFilter'])->name('DepositWithdrawFilter');
// Route::resource('/UsersRequests', UserAccountsController::class);

// Route for login and logout
// Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
/////////////////////////////////////////////////////////////////////////////////////

// api to get all charts data
Route::get('/home', [apiChartsController::class, 'index'])->name('ChartData')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////

//apis to manage users
Route::get('/Get-all-users', [apiUserController::class, 'GetAllUsers'])->middleware('auth');
Route::get('/Get-Company-users', [apiUserController::class, 'GetCompanyUsers'])->middleware('auth');
Route::delete('/delete-user', [apiUserController::class, 'destroy'])->middleware('auth');
Route::put('/edit-user/{user_id}', [apiUserController::class, 'update'])->middleware('auth');
Route::get('/get-user-accounts/{user_id}', [apiUserAccountsController::class, 'getUserAccounts'])->middleware('auth');
///////////////////////////////////////////////////////////////////////////////////////

//apis to manage Managers
Route::post('/Create-manager', [apiManagerController::class, 'create'])->middleware('auth');
Route::get('/get-all-managers', [apiManagerController::class, 'getAllManagers'])->middleware('auth');
Route::put('/edit-manager/{manager_id}', [apiManagerController::class, 'update'])->middleware('auth');
Route::delete('/delete-manager/{manager_id}', [apiManagerController::class, 'destroy'])->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////

//apis to manage emails
Route::post('/Create&Send-new-email', [apiEmailController::class, 'create'])->middleware('auth');
Route::post('/Send-Existing-email/{email_id}', [apiEmailController::class, 'sendEmail'])->middleware('auth');
Route::get('/get-all-Existing-emails', [apiEmailController::class, 'getAllEmails'])->middleware('auth');
Route::get('/store-emails', [apiEmailController::class, 'storeEmail']);
//////////////////////////////////////////////////////////////////////////////////////////

//apis to manage request

// 1- Deposit & Withdraw Requests
Route::get('/get-all-Deposit&Withdraw-requests', [apiDeposit_WithdrawController::class, 'getAllDepositWithdraw'])->middleware('auth');
Route::put('/change-request-status/{request_id}', [apiDeposit_WithdrawController::class, 'update'])->middleware('auth');

//2- Documents request 
Route::get('/get-all-Documents-requests', [apiDocumentController::class, 'getAllDocumentsRequest'])->middleware('auth');
Route::put('/change-Documents-status/{Document_id}', [apiDocumentController::class, 'update'])->middleware('auth');

//3- Real accounts request 
Route::get('/get-all-RealAccounts-requests', [apiRealAccountsController::class, 'getAllRequest'])->middleware('auth');
Route::put('/accept-RealAccounts-requests/{RealAccounts_id}', [apiRealAccountsController::class, 'accept'])->middleware('auth');
Route::put('/reject-RealAccounts-requests/{RealAccounts_id}', [apiRealAccountsController::class, 'reject'])->middleware('auth');
Route::put('/change-RealAccount-leverage/{RealAccounts_id}', [apiRealAccountsController::class, 'ChangeLeverage'])->middleware('auth');
///////////////////////////////////////////////////////////////////////////////////////////////

//apis to manage Bonus
Route::post('/create-bonus', [apiBonusController::class, 'create'])->middleware('auth');
Route::put('/edit-bonus/{bonus_id}', [apiBonusController::class, 'update'])->middleware('auth');
Route::delete('/delete-bonus/{bonus_id}', [apiBonusController::class, 'destroy'])->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////////

//apis to manage accounts
Route::get('/get-all-Accounts', [apiUserAccountsController::class, 'getAllAccounts'])->middleware('auth');
Route::delete('/delete-Account/{Account_id}', [apiUserAccountsController::class, 'destroy'])->middleware('auth');
/////////////////////////////////////////////////////////////////////////////

//apis to manage News
Route::get('/get-all-news', [apiNewsController::class, 'getAllNews'])->middleware('auth');
Route::post('/create-news', [apiNewsController::class, 'create'])->middleware('auth');
Route::put('/edit-news', [apiNewsController::class, 'update'])->middleware('auth');
Route::delete('/delete-news/{news_id}', [apiNewsController::class, 'destroy'])->middleware('auth');

// Route::group(['prefix' => 'internal'], function () {
//     Route::get('sockets/serve', function () {
//         \Illuminate\Support\Facades\Artisan::call('websockets:serve');
//     });
// });
