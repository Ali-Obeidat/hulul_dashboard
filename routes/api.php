<?php

use App\Http\Controllers\API\apiChartsController;
use App\Http\Controllers\API\apiEmailController;
use App\Http\Controllers\API\apiManagerController;
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
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
/////////////////////////////////////////////////////////////////////////////////////

// api to get all charts data
Route::get('/home', [apiChartsController::class, 'index'])->name('ChartData')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////

//apis to manage users
Route::get('/Get-all-users', [apiUserController::class,'GetAllUsers'])->middleware('auth');
Route::get('/Get-Company-users', [apiUserController::class,'GetCompanyUsers'])->middleware('auth');
Route::delete('/delete-user', [apiUserController::class,'destroy'])->middleware('auth');
Route::put('/edit-user/{user_id}', [apiUserController::class,'update'])->middleware('auth');
Route::get('/get-user-accounts/{user_id}', [apiUserAccountsController::class,'getUserAccounts'])->middleware('auth');
///////////////////////////////////////////////////////////////////////////////////////

//api to manage Managers
Route::post('/Create-manager', [apiManagerController::class,'create'])->middleware('auth');
Route::get('/get-all-managers', [apiManagerController::class,'getAllManagers'])->middleware('auth');
Route::put('/edit-manager/{manager_id}', [apiManagerController::class,'update'])->middleware('auth');
Route::delete('/delete-manager/{manager_id}', [apiManagerController::class,'destroy'])->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////

//api to manage emails
Route::post('/Create&Send-new-email', [apiEmailController::class,'create'])->middleware('auth');
Route::post('/Send-Existing-email/{email_id}', [apiEmailController::class,'sendEmail'])->middleware('auth');





