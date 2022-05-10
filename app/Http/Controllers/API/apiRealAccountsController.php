<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\AcceptRealAccount;
use App\Mail\RejectRealAccount;
use App\Models\MtHulul;
use App\Models\PendingRealAccount;
use Illuminate\Http\Request;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikh\PhpMeta\Entities\User;
use App\Models\User as LoginUser;
use Illuminate\Support\Facades\Mail;

class apiRealAccountsController extends Controller
{
    public function getAllRequest()
    {

        $pendingRealAccounts = PendingRealAccount::where('account_status', 'pending')->get();
        // return $pendingRealAccounts;
        return ['real accounts requests' => $pendingRealAccounts];
    }

    public function accept( $id)
    {
        $realAccount = PendingRealAccount::find($id);
        $loginUser = LoginUser::find($realAccount->user_id);
        // return $realAccount->address;
        if ($realAccount->account_status == 'accepted') {
            return 'this account already accepted';
        }
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
        try {
            Mail::to($loginUser->email)->send(new AcceptRealAccount($userData));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return  'you accepted the real account';
    }

    public function reject( $id)
    {
        
        // return  $request;
        $realAccount = PendingRealAccount::find($id);
        $loginUser = LoginUser::find($realAccount->user_id);
        if ($realAccount->account_status == 'rejected') {
            return 'this account already rejected';
        }
        $realAccount->account_status = 'rejected';
        $realAccount->save();
        Mail::to($loginUser->email)->send(new RejectRealAccount($loginUser));
        return  'you rejected the real account';
    }

    public function ChangeLeverage(Request $request, $id)
    {
       

        $account = PendingRealAccount::find($id);
       

        $account->leverage = $request['leverage'];
        $account->save();


       return 'leverage was change successfully';
    }
}
