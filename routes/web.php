<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerEmailController;
use App\Http\Controllers\UserAccountsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\DepositWithdrawController;
use App\Http\Controllers\MtHululController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicBonus;
use App\Http\Controllers\PublicBonusController;
use App\Http\Controllers\RealAccountsController;
use App\Models\UserAccounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

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
    $options = array(
        'cluster' => 'ap2',
        'useTLS' => true
    );
    
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );

    $data = ['message' => 'ali'];
    $pusher->trigger('notifications', 'Notifications', $data);
    // event(new App\Events\Notifications('Hello World'));

    return view('welcome');
});

Auth::routes();
// Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('showLoginForm');


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

Route::get('Real-account-request', [RealAccountsController::class, 'showAllRequest'])->middleware('auth')->name('showAllRequest');
Route::put('/accept-Real-account/{id}', [RealAccountsController::class, 'accept'])->middleware('auth')->name('accept');
Route::put('/reject-Real-account/{id}', [RealAccountsController::class, 'reject'])->middleware('auth')->name('reject');
Route::get('/edit-Real-account-Leverage/{id}', [RealAccountsController::class, 'edit'])->middleware('auth')->name('changeLeveragePage');
Route::put('/edit-Real-account-Leverage/{id}', [RealAccountsController::class, 'ChangeLeverage'])->middleware('auth')->name('ChangeLeverage');

//sitting Request
Route::get('/Real-account-leverage-request', [RealAccountsController::class, 'changeLeverageRequestPage'])->middleware('auth')->name('changeLeverageRequestPage');
Route::put('/Change-leverage-request-status/{id}', [RealAccountsController::class, 'ChangeLeverageStatus'])->middleware('auth')->name('ChangeLeverageStatus');
//balance 
Route::get('/Real-account-balance-request', [RealAccountsController::class, 'changeBalanceRequestPage'])->middleware('auth')->name('changeBalanceRequestPage');
Route::put('/Change-balance-request-status/{id}', [RealAccountsController::class, 'ChangeBalanceStatus'])->middleware('auth')->name('ChangeBalanceStatus');

// DepositWithdraw request
Route::get('/Show-Deposit-request', [DepositWithdrawController::class, 'ShowDepositRequestPage'])->middleware('auth')->name('ShowDepositRequestPage');
Route::get('/Show-Accepted-Deposit-request', [DepositWithdrawController::class, 'AcceptedDepositRequestPage'])->middleware('auth')->name('AcceptedDepositRequestPage');
Route::get('/Show-Rejected-Deposit-request', [DepositWithdrawController::class, 'RejectedDepositRequestPage'])->middleware('auth')->name('RejectedDepositRequestPage');
Route::put('/Change-Deposit-request-status/{id}', [DepositWithdrawController::class, 'ChangeDepositStatus'])->middleware('auth')->name('ChangeDepositStatus');
//
Route::get('/Show-Withdraw-request', [DepositWithdrawController::class, 'ShowWithdrawRequestPage'])->middleware('auth')->name('ShowWithdrawRequestPage');
Route::get('/Show-Accepted-Withdraw-request', [DepositWithdrawController::class, 'AcceptedWithdrawRequestPage'])->middleware('auth')->name('AcceptedWithdrawRequestPage');
Route::get('/Show-Rejected-Withdraw-request', [DepositWithdrawController::class, 'RejectedWithdrawRequestPage'])->middleware('auth')->name('RejectedWithdrawRequestPage');
// publicBonus
// Route::get('/create-public-Bonus-page',[PublicBonus::class,'create'])->name('publicBonus.page')->middleware('auth');
// Route::post('/create-public-Bonus',[PublicBonus::class,'store'])->name('publicBonus.store')->middleware('auth');
Route::resource('/public-Bonus', PublicBonusController::class)->middleware('auth');

// Route::get('sockets/serve', function () {
//     \Illuminate\Support\Facades\Artisan::call('websockets:serve');
// });
