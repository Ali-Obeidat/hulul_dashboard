<?php

namespace App\Http\Controllers;

use App\Events\Notifications;
use App\Mail\AcceptRealAccount;
use App\Mail\RejectRealAccount;
use App\Models\MtHulul;
use App\Models\Notification;
use App\Models\PendingRealAccount;
use App\Models\RealAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikh\PhpMeta\Entities\User;
use App\Models\User as LoginUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laravel\Ui\Presets\React;
use Tarikh\PhpMeta\MetaTraderClient;
use Tarikh\PhpMeta\Lib\MTUserProtocol;
use Tarikhagustia\LaravelMt5\Entities\Trade;
use Stichoza\GoogleTranslate\GoogleTranslate;



class RealAccountsController extends Controller
{
    public function showAllRequest()
    {
        $pendingRealAccounts = PendingRealAccount::where('account_status', 'pending')->get();
        // return $pendingRealAccounts;
        return view('admin.realAccount.allRequest', compact('pendingRealAccounts'));
    }
    public function accept($id)
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


        try {

            Mail::to($loginUser->email)->send(new AcceptRealAccount($userData));
        } catch (\Throwable $th) {
        }
        $langs = ['ar', 'en'];
        $transBody = [];
        $title = 'accept-realAccount';
        $body = 'Your request to create Real Account has been approved by the admin and the account Login: ' . $result->getLogin();
        $image = 'wallet-add';
        $info = [
            'account_id' => $userData->id,
            'login' => $result->getLogin(),
        ];
        foreach ($langs as $lang) {
            $tr = new GoogleTranslate($lang, null);
            //  $transBody = [...$transBody, $lang => $tr->translate($body)];
            array_push($transBody, [$lang => $tr->translate($body)]);
        }
        event(new Notifications($title, $transBody, $loginUser->id, $image, $info));

        Notification::create([
            'user_id' => $loginUser->id,
            'title' => $title,
            'notification_body' => $body,
            'notification_image' => $image,
            'info' => $info,
        ]);
        return back()->with('success', 'you accepted the real account');
    }

    public function reject($id)
    {
        // return  $request;
        $realAccount = PendingRealAccount::find($id);
        $loginUser = LoginUser::find($realAccount->user_id);
        $realAccount->account_status = 'rejected';
        $realAccount->save();
        try {

            Mail::to($loginUser->email)->send(new RejectRealAccount($loginUser));
        } catch (\Throwable $th) {
        }

        $langs = ['ar', 'en'];
        $transBody = [];
        $title = 'reject-realAccount';
        $body = 'Your request to create Real Account has been rejected by the admin';
        $image = 'wallet-add';

        $info = [];
        foreach ($langs as $lang) {
            $tr = new GoogleTranslate($lang, null);
            //  $transBody = [...$transBody, $lang => $tr->translate($body)];
            array_push($transBody, [$lang => $tr->translate($body)]);
        }
        event(new Notifications($title, $transBody, $loginUser->id, $image, $info));
        Notification::create([
            'user_id' => $loginUser->id,
            'title' => $title,
            'notification_body' => $body,
            'notification_image' => $image,
            'info' => $info,
        ]);
        return back()->with('error', 'you rejected the real account');
    }

    public function edit($id)
    {
        $account = PendingRealAccount::find($id);
        return view('admin.realAccount.changeLeverage', compact('account'));
    }
    // --------------------------------------------------------------------------------
    // Change leverage
    public function changeLeverageRequestPage()
    {
        // $requests = RealAccountRequest::all();
        $requests = DB::table('real_account_requests')
            ->where('Request_type', '=', 'change leverage')
            ->join('users', 'real_account_requests.user_id', '=', 'users.id')
            ->join('mt_hululs', 'real_account_requests.account_id', '=', 'mt_hululs.id')
            ->select(
                'real_account_requests.id',
                'real_account_requests.user_id',
                'real_account_requests.account_id',
                'real_account_requests.Request_type',
                'real_account_requests.old_value',
                'real_account_requests.new_value',
                'real_account_requests.request_status',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $requests[0]->request_status;

        return view('admin.realAccount.SittingRequest.ChangeleverageRequest', compact('requests'));
    }

    public function ChangeLeverageStatus(Request $request, $id)
    {
        //    return $request;

        $sittingRequest = RealAccountRequest::find($id);
        $accountInfo = MtHulul::find($sittingRequest['account_id']);

        if ($sittingRequest->request_status == 'Accepted' && $request['request_status'] == 'Accepted') {
            abort(404, 'Go back');
        }
        if ($sittingRequest->request_status == 'Rejected' && $request['request_status'] == 'Rejected') {
            abort(404, 'Go back');
        }
        if ($request['request_status'] == 'Accepted') {
            $api = new LaravelMt5();
            $api2 = new  MetaTraderClient('198.244.148.208', '443', '1005', 'kopiuy21sa');
            $user = new User();
            $user->Login = $accountInfo->login;
            $user->Email = $accountInfo->email;
            $user->Group = 'preliminary';
            $user->Leverage = $request['new_value'];
            $user->Name = $accountInfo->name;
            $user->Company = null;
            $user->Language = null;
            $user->Country = $accountInfo->country;
            $user->City = $accountInfo->city;
            $user->State = $accountInfo->state;
            $user->ZipCode = $accountInfo->zipcode;
            $user->Address = $accountInfo->address;
            $user->ID = null;
            $user->Phone = $accountInfo->phone;
            $user->Status = null;
            $user->Comment = null;
            $user->Color = $accountInfo->color;
            $user->PhonePassword = ($accountInfo->password);
            $user->Agent = null;
            $user->Rights = null;
            $user->MainPassword = ($accountInfo->password);
            $user->InvestorPassword = ($accountInfo->password);
            $api2->updateUser($user);

            // change account leverage in database (mt_hulul table)
            $accountInfo->leverage = $request['new_value'];
            $accountInfo->save();
            $sittingRequest->request_status = $request['request_status'];
            $sittingRequest->save();
            $langs = ['ar', 'en'];
            $transBody = [];
            $title = 'accept-leverage-change';
            $body = 'Your request to change Real Account leverage from: ' . $sittingRequest->old_value . ' to: ' . $request['new_value'] . ' has been accepted by the admin';
            $image = 'leverage';
            $info = [
                'account_id' => $accountInfo->id,
                'login' => $accountInfo->login,
                'new_leverage' => $request['new_value'],
            ];
            foreach ($langs as $lang) {
                $tr = new GoogleTranslate($lang, null);
                //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                array_push($transBody, [$lang => $tr->translate($body)]);
            }
            event(new Notifications($title, $transBody, $accountInfo->user_id, $image, $info));
            Notification::create([
                'user_id' => $accountInfo->user_id,
                'title' => $title,
                'notification_body' => $body,
                'notification_image' => $image,
                'info' => $info,
            ]);

            return back()->with('success', 'you accepted the Change in real account sitting');
        } elseif ($request['request_status'] == 'Rejected') {
            $sittingRequest->request_status = $request['request_status'];
            $sittingRequest->save();

            $langs = ['ar', 'en'];
            $transBody = [];
            $title = 'reject-leverage-change';
            $body = 'Your request to change Real Account leverage from: ' . $sittingRequest->old_value . ' to: ' . $request['new_value'] . ' has been rejected by the admin';
            $image = 'leverage';

            $info = [
                'account_id' => $accountInfo->id,
                'login' => $accountInfo->login,
                'new_leverage' => $request['new_value'],
            ];
            foreach ($langs as $lang) {
                $tr = new GoogleTranslate($lang, null);
                //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                array_push($transBody, [$lang => $tr->translate($body)]);
            }
            event(new Notifications($title, $transBody, $accountInfo->user_id, $image, $info));
            Notification::create([
                'user_id' => $accountInfo->user_id,
                'title' => $title,
                'notification_body' => $body,
                'notification_image' => $image,
                'info' => $info,
            ]);

            return back()->with('error', 'you rejected the the Change in real account sitting');
        }
    }
    // ----------------------------------------------------------------------------------------------
    // Change Balance
    public function changeBalanceRequestPage()
    {
        // $requests = RealAccountRequest::all();
        $requests = DB::table('real_account_requests')
            ->where('Request_type', '=', 'change balance')
            ->join('users', 'real_account_requests.user_id', '=', 'users.id')
            ->join('mt_hululs', 'real_account_requests.account_id', '=', 'mt_hululs.id')
            ->select(
                'real_account_requests.id',
                'real_account_requests.user_id',
                'real_account_requests.account_id',
                'real_account_requests.Request_type',
                'real_account_requests.old_value',
                'real_account_requests.new_value',
                'real_account_requests.request_status',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $requests[0]->request_status;
        return view('admin.realAccount.SittingRequest.ChangeBalanceRequest', compact('requests'));
    }

    public function ChangeBalanceStatus(Request $request, $id)
    {
        // return $request;

        $sittingRequest = RealAccountRequest::find($id);
        $accountInfo = MtHulul::find($sittingRequest['account_id']);

        if ($sittingRequest->request_status == 'Accepted' && $request['request_status'] == 'Accepted') {
            abort(404, 'Go back');
        }
        if ($sittingRequest->request_status == 'Rejected' && $request['request_status'] == 'Rejected') {
            abort(404, 'Go back');
        }
        if ($request['request_status'] == 'Accepted') {
            //add balance to account
            try {
                $api = new LaravelMt5();
                $balance = new  MTUserProtocol($api);
                $api->conductUserBalance($accountInfo['login'], Trade::DEAL_BALANCE, (int)($request->new_value), 'aaaaaa');
            } catch (\Throwable $th) {
                //throw $th;
            }

            // change request status
            $sittingRequest->request_status = $request['request_status'];
            $sittingRequest->save();

            //send notification
            $langs = ['ar', 'en'];
            $transBody = [];
            $title = 'accept-balance-change';
            $body = 'Your request to change Real Account balance from: ' . $sittingRequest->old_value . ' to: ' . $request['new_value'] . ' has been accepted by the admin';
            $image = 'card-send';
            $info = [
                'account_id' => $accountInfo->id,
                'login' => $accountInfo->login,

            ];
            foreach ($langs as $lang) {
                $tr = new GoogleTranslate($lang, null);
                //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                array_push($transBody, [$lang => $tr->translate($body)]);
            }
            event(new Notifications($title, $transBody, $accountInfo->user_id, $image, $info));

            Notification::create([
                'user_id' => $accountInfo->user_id,
                'title' => $title,
                'notification_body' => $body,
                'notification_image' => $image,
                'info' => $info,
            ]);
            return back()->with('success', 'you accepted the Change in real account sitting');
        } elseif ($request['request_status'] == 'Rejected') {
            // change request status
            $sittingRequest->request_status = $request['request_status'];
            $sittingRequest->save();
            //send notification 
            $langs = ['ar', 'en'];
            $transBody = [];
            $title = 'reject-balance-change';
            $body = 'Your request to change Real Account balance from: ' . $sittingRequest->old_value . ' to: ' . $request['new_value'] . ' has been rejected by the admin';
            $image = 'card-send';
            $info = [
                'account_id' => $accountInfo->id,
                'login' => $accountInfo->login,

            ];
            foreach ($langs as $lang) {
                $tr = new GoogleTranslate($lang, null);
                //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                array_push($transBody, [$lang => $tr->translate($body)]);
            }
            event(new Notifications($title, $transBody, $accountInfo->user_id, $image, $info));

            Notification::create([
                'user_id' => $accountInfo->user_id,
                'title' => $title,
                'notification_body' => $body,
                'notification_image' => $image,
                'info' => $info,
            ]);
            return back()->with('error', 'you rejected the the Change in real account sitting');
        }
    }


    // -------------------------------------------------------------------------------------
    public function ChangeLeverage(Request $request, $id)
    {
        // return $request;
        $account = PendingRealAccount::find($id);
        $account->leverage = $request['leverage'];
        $account->save();


        Alert::success('Real Account leverage', 'leverage was change successfully');
        return redirect(route('showAllRequest'));
    }
    public function activatedRealAccount($id)
    {
        $accountInfo = MtHulul::find($id);
        $langs = ['ar', 'en'];
        $transBody = [];
        $title = 'activate-real-account';
        $body = 'The admin activated your real account: ' . $accountInfo->login;
        $image = 'card-send';
        $info = [
            'account_id' => $accountInfo->id,
            'login' => $accountInfo->login,

        ];
        foreach ($langs as $lang) {
            $tr = new GoogleTranslate($lang, null);
            //  $transBody = [...$transBody, $lang => $tr->translate($body)];
            array_push($transBody, [$lang => $tr->translate($body)]);
        }
        event(new Notifications($title, $transBody, $accountInfo->user_id, $image, $info));

        Notification::create([
            'user_id' => $accountInfo->user_id,
            'title' => $title,
            'notification_body' => $body,
            'notification_image' => $image,
            'info' => $info,
        ]);

        return back()->with('success', 'you activated the real account successfully');
    }
}
