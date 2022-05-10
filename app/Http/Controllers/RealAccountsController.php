<?php

namespace App\Http\Controllers;

use App\Mail\AcceptRealAccount;
use App\Mail\RejectRealAccount;
use App\Models\MtHulul;
use App\Models\PendingRealAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikh\PhpMeta\Entities\User;
use App\Models\User as LoginUser;
use Illuminate\Support\Facades\Mail;
use Laravel\Ui\Presets\React;
use Tarikh\PhpMeta\MetaTraderClient;


class RealAccountsController extends Controller
{
    public function showAllRequest()
    {
        $pendingRealAccounts = PendingRealAccount::where('account_status', 'pending')->get();
        // return $pendingRealAccounts;
        return view('admin.realAccount.allRequest', compact('pendingRealAccounts'));
    }
    public function accept( $id)
    {
        $realAccount = PendingRealAccount::find($id);
        $loginUser = LoginUser::find($realAccount->user_id);
        // return $realAccount->address;

        $api = new LaravelMt5();
        $user = new User();
        $user->setName($realAccount->name);
        $user->setEmail($realAccount->email);
        $user->setGroup('preliminary');

        $user->setLeverage(($realAccount->leverage));
        $user->setPhone($realAccount->phone);
        $user->setAddress($realAccount->adders);
        $user->setCity($realAccount->city);
        $user->setState($realAccount->state);
        $user->setCountry($realAccount->citizenship);
        $user->setZipCode($realAccount->zip_code);
        $user->setMainPassword($realAccount->password);
        $user->setInvestorPassword($realAccount->password);
        $user->setPhonePassword($realAccount->password);
        // dd($user);
        $result = $api->createUser($user);

        $realAccount->account_status = 'accepted';
        $realAccount->login = $result->getLogin();
        $realAccount->save();


        $userData = new MtHulul();
        $userData->name = $realAccount->name;
        $userData->login = $result->getLogin();
        $userData->email = $realAccount->email;
        $userData->group = ('preliminary');
        $userData->leverage = $realAccount->leverage;
        $userData->account_type = $realAccount->account_type;
        $userData->currency = $realAccount->currency;
        $userData->phone = $realAccount->phone;
        $userData->address = $realAccount->address;
        $userData->city = $realAccount->city;
        $userData->state = $realAccount->state;
        $userData->country = $realAccount->country;
        $userData->zipcode = $realAccount->zipcode;
        $userData->password = $realAccount->password;
        $userData->invest_password = $realAccount->password;
        $userData->phone_password = $realAccount->password;
        // $userData->account_status = "pending";
        $userData->user_id = ($realAccount->user_id);
        $userData->save();


        // try {

        Mail::to($loginUser->email)->send(new AcceptRealAccount($userData));
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        return back()->with('success', 'you accepted the real account');
    }

    public function reject( $id)
    {
        // return  $request;
        $realAccount = PendingRealAccount::find($id);
        $loginUser = LoginUser::find($realAccount->user_id);
        $realAccount->account_status = 'rejected';
        $realAccount->save();
        Mail::to($loginUser->email)->send(new RejectRealAccount($loginUser));
        return back()->with('error', 'you rejected the real account');


    }

    public function edit($id)
    {
        $account = PendingRealAccount::find($id);
        // return $account;
        return view('admin.realAccount.changeLeverage', compact('account'));
    }
    public function ChangeLeverage(Request $request, $id)
    {
        // return $request;

        $account = PendingRealAccount::find($id);
        // $api = new LaravelMt5();
        //  $api2 = new  MetaTraderClient('198.244.148.208', '443', '1005', 'abcd1234');
        //  $user = new User();
        //  $user->Login = $account->login;
        //  $user->Email = $account->email;
        //  $user->Group = 'preliminary';
        //  $user->Leverage = $request['leverage'];
        //  $user->Name = $account->name;
        //  $user->Company = null;
        //  $user->Language = null;
        //  $user->Country = $account->country;
        //  $user->City = $account->city;
        //  $user->State = $account->state;
        //  $user->ZipCode = $account->zipcode;
        //  $user->Address = $account->address;
        //  $user->ID = null;
        //  $user->Phone = $account->phone;
        //  $user->Status = null;
        //  $user->Comment = null;
        //  $user->Color = null;
        //  $user->PhonePassword = $account->password;
        //  $user->Agent = null;
        //  $user->Rights=null;
        //  $user->MainPassword = ($account->password);
        //  $user->InvestorPassword = ($account->password);
        //  $api2->updateUser($user);

        $account->leverage = $request['leverage'];
        $account->save();


        Alert::success('Real Account leverage', 'leverage was change successfully');
        return redirect(route('showAllRequest'));
    }
}
