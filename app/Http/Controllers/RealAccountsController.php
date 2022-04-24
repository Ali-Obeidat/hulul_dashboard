<?php

namespace App\Http\Controllers;

use App\Models\MtHulul;
use App\Models\PendingRealAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Tarikhagustia\LaravelMt5\LaravelMt5;


class RealAccountsController extends Controller
{
    public function showAllRequest()
    {
        $pendingRealAccounts= PendingRealAccount::where('account_status','pending')->get();
        // return $pendingRealAccounts;
            return view('admin.realAccount.allRequest',compact('pendingRealAccounts'));
        
        
        
    }
    public function accept(Request $request)
    {
        // return $request;
        $loginUser = Auth::user();
        $basicInfo = $loginUser->information;

        // $api = new LaravelMt5();
        //     $user = new User();
        //     $user->setName($loginUser->name);
        //     $user->setEmail($loginUser->email);
        //     $user->setGroup('preliminary');
            
        //     $user->setLeverage(($request->leverage));
        //     $user->setPhone($basicInfo->phone);
        //     $user->setAddress($basicInfo->adders);
        //     $user->setCity($basicInfo->city);
        //     $user->setState($basicInfo->state);
        //     $user->setCountry($basicInfo->citizenship);
        //     $user->setZipCode($basicInfo->zip_code);
        //     $user->setMainPassword($loginUser->password);
        //     $user->setInvestorPassword($loginUser->password);
        //     $user->setPhonePassword($loginUser->password);
        //     // dd($user);
        //     $result = $api->createUser($user);


            $userData = new PendingRealAccount();
            $userData->name = $basicInfo->full_name;
            $userData->login = 0;
            $userData->email = $basicInfo->email;
            $userData->group = ('preliminary');
            $userData->leverage = (($request->leverage));
            $userData->account_type = (($request->account_type));
            $userData->currency = (($request->currency));
            $userData->phone = ($basicInfo->phone);
            $userData->address = ($basicInfo->adders);
            $userData->city = ($basicInfo->city);
            $userData->state = ($basicInfo->state);
            $userData->country = ($basicInfo->citizenship);
            $userData->zipcode = ($basicInfo->zip_code);
            $userData->password = ($loginUser->password);
            $userData->invest_password = ($loginUser->password);
            $userData->phone_password = ($loginUser->password);
            $userData->account_status = "pending";
            $userData->user_id = (auth()->user()->id);
            $userData->save();
            Alert::info('Real Account', 'The manager will look to your request ');
            return redirect('/demos/Trading/preliminary');
    }
}
