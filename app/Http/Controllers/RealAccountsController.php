<?php

namespace App\Http\Controllers;

use App\Mail\AcceptRealAccount;
use App\Models\MtHulul;
use App\Models\PendingRealAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikh\PhpMeta\Entities\User;
use App\Models\User as LoginUser;
use Illuminate\Support\Facades\Mail;

class RealAccountsController extends Controller
{
    public function showAllRequest()
    {
        $pendingRealAccounts= PendingRealAccount::where('account_status','pending')->get();
        // return $pendingRealAccounts;
            return view('admin.realAccount.allRequest',compact('pendingRealAccounts'));
        
        
        
    }
    public function accept(Request $request,$id)
    {
        $loginUser = LoginUser::find($request['user_id']);
        $realAccount = PendingRealAccount::find($id);
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

        $realAccount -> account_status= 'accepted';
        $realAccount -> login= $result->getLogin();
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
        $userData->city =$realAccount->city;
        $userData->state = $realAccount->state;
        $userData->country = $realAccount->country;
        $userData->zipcode = $realAccount->zipcode;
        $userData->password = $realAccount->password;
        $userData->invest_password = $realAccount->password;
        $userData->phone_password =$realAccount->password;
        // $userData->account_status = "pending";
        $userData->user_id = ($request['user_id']);
        $userData->save();

        
        // try {
            
            Mail::to($loginUser->email)->send(new AcceptRealAccount($userData));
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        return back();
    }
}
