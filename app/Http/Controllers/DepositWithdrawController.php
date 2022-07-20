<?php

namespace App\Http\Controllers;

use App\Events\Notifications;
use App\Models\DepositWithdraw;
use App\Models\MtHulul;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DepositWithdrawController extends Controller
{
    //Deposit
    public function ShowDepositRequestPage()
    {

        // $depositRequests = DepositWithdraw::where('type', 'Deposit')->get();
        $depositRequests =  DB::table('deposit_withdraws')
            ->where('deposit_withdraws.type', '=', 'Deposit')
            ->join('users', 'deposit_withdraws.user_id', '=', 'users.id')
            ->join('mt_hululs', 'deposit_withdraws.account_id', '=', 'mt_hululs.id')
            ->select(
                'deposit_withdraws.id',
                'deposit_withdraws.type',
                'deposit_withdraws.bank_name',
                'deposit_withdraws.recipient_name',
                'deposit_withdraws.account_number',
                'deposit_withdraws.Remittance_notices',
                'deposit_withdraws.amount_transferred',
                'deposit_withdraws.status',
                'deposit_withdraws.created_at',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $depositRequests;
        return view('admin.realAccount.Deposit&Withdraw.depositRequest', compact('depositRequests'));
    }
    public function AcceptedDepositRequestPage()
    {

        // $depositRequests = DepositWithdraw::where('type', 'Deposit')->get();
        $depositRequests =  DB::table('deposit_withdraws')
            ->where('deposit_withdraws.type', '=', 'Deposit')
            ->where('deposit_withdraws.status', '=', 'Accepted')
            ->join('users', 'deposit_withdraws.user_id', '=', 'users.id')
            ->join('mt_hululs', 'deposit_withdraws.account_id', '=', 'mt_hululs.id')
            ->select(
                'deposit_withdraws.id',
                'deposit_withdraws.type',
                'deposit_withdraws.bank_name',
                'deposit_withdraws.recipient_name',
                'deposit_withdraws.account_number',
                'deposit_withdraws.Remittance_notices',
                'deposit_withdraws.amount_transferred',
                'deposit_withdraws.status',
                'deposit_withdraws.created_at',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $depositRequests;
        return view('admin.realAccount.Deposit&Withdraw.AcceptedDepositRequest', compact('depositRequests'));
    }
    public function RejectedDepositRequestPage()
    {

        // $depositRequests = DepositWithdraw::where('type', 'Deposit')->get();
        $depositRequests =  DB::table('deposit_withdraws')
            ->where('deposit_withdraws.type', '=', 'Deposit')
            ->where('deposit_withdraws.status', '=', 'Rejected')
            ->join('users', 'deposit_withdraws.user_id', '=', 'users.id')
            ->join('mt_hululs', 'deposit_withdraws.account_id', '=', 'mt_hululs.id')
            ->select(
                'deposit_withdraws.id',
                'deposit_withdraws.type',
                'deposit_withdraws.bank_name',
                'deposit_withdraws.recipient_name',
                'deposit_withdraws.account_number',
                'deposit_withdraws.Remittance_notices',
                'deposit_withdraws.amount_transferred',
                'deposit_withdraws.status',
                'deposit_withdraws.created_at',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $depositRequests;
        return view('admin.realAccount.Deposit&Withdraw.RejectedDepositRequest', compact('depositRequests'));
    }

    public function ChangeDepositStatus(Request $request, $id)
    {

        $DepositRequest = DepositWithdraw::find($id);
        $accountInfo = MtHulul::find($DepositRequest->account_id);

        if ($DepositRequest->status == 'Accepted' && $request['status'] == 'Accepted') {
            abort(404, 'Go back');
        }
        if ($DepositRequest->status == 'Rejected' && $request['status'] == 'Rejected') {
            abort(404, 'Go back');
        }
        if ($DepositRequest->status == 'withdrawn' && $request['status'] == 'withdrawn') {
            abort(404, 'Go back');
        }
        if ($DepositRequest->status == 'deposited' && $request['status'] == 'deposited') {
            abort(404, 'Go back');
        }
        if ($request['status'] == 'Accepted') {

            $DepositRequest->status = $request['status'];
            $DepositRequest->save();

            if ($DepositRequest->type == 'Deposit') {

                $body = 'Deposit ' . $DepositRequest->amount_transferred . ' request to account: ' . $accountInfo->login . ' has been accepted by the admin.';
                $image = 'money-recive';
                event(new Notifications($body, $DepositRequest->user_id, $image));

                Notification::create([
                    'user_id' => $DepositRequest->user_id,
                    'notification_body' => $body,
                    'notification_image' => $image,
                ]);
            } elseif ($DepositRequest->type == 'Withdraw') {
                $body = 'Withdrawing ' . $DepositRequest->amount_transferred . ' request from account: ' . $accountInfo->login . ' has been accepted by the admin.';
                $image = 'money-send';
                event(new Notifications($body, $DepositRequest->user_id, $image));

                Notification::create([
                    'user_id' => $DepositRequest->user_id,
                    'notification_body' => $body,
                    'notification_image' => $image,
                ]);
            }
            return back()->with('success', 'you accepted the deposit request');
        } elseif ($request['status'] == 'Rejected') {
            $DepositRequest->status = $request['status'];
            $DepositRequest->save();
            if ($DepositRequest->type = 'Deposit') {

                $body = 'Deposit ' . $DepositRequest->amount_transferred . '$ request to account: ' . $accountInfo->login . ' has been rejected by the admin.';
                $image = 'money-recive';
                event(new Notifications($body, $DepositRequest->user_id, $image));

                Notification::create([
                    'user_id' => $DepositRequest->user_id,
                    'notification_body' => $body,
                    'notification_image' => $image,
                ]);
            } elseif ($DepositRequest->type = 'Withdraw') {
                $body = 'Withdrawing ' . $DepositRequest->amount_transferred . '$ request from account: ' . $accountInfo->login . ' has been rejected by the admin.';
                $image = 'money-send';
                event(new Notifications($body, $DepositRequest->user_id, $image));

                Notification::create([
                    'user_id' => $DepositRequest->user_id,
                    'notification_body' => $body,
                    'notification_image' => $image,
                ]);
            }
            return back()->with('error', 'you rejected the deposit request');
        } elseif ($request['status'] == 'deposited') {
            $DepositRequest->status = $request['status'];
            $DepositRequest->save();

            $body =  $DepositRequest->amount_transferred . '$ has been deposited to account: ' . $accountInfo->login . '.';
            $image = 'money-recive';
            event(new Notifications($body, $DepositRequest->user_id, $image));

            Notification::create([
                'user_id' => $DepositRequest->user_id,
                'notification_body' => $body,
                'notification_image' => $image,
            ]);

            return back()->with('success', 'you deposited the amount');
        } elseif ($request['status'] == 'withdrawn') {

            $DepositRequest->status = $request['status'];
            $DepositRequest->save();
            $body =  $DepositRequest->amount_transferred . '$ has been withdrawn from account: ' . $accountInfo->login . '.';
            $image = 'money-send';
            event(new Notifications($body, $DepositRequest->user_id, $image));

            Notification::create([
                'user_id' => $DepositRequest->user_id,
                'notification_body' => $body,
                'notification_image' => $image,
            ]);

            return back()->with('success', 'you Withdraw the amount');
        }
    }


    public function ShowWithdrawRequestPage()
    {

        // $depositRequests = DepositWithdraw::where('type', 'Deposit')->get();
        $depositRequests =  DB::table('deposit_withdraws')
            ->where('deposit_withdraws.type', '=', 'Withdraw')
            ->join('users', 'deposit_withdraws.user_id', '=', 'users.id')
            ->join('mt_hululs', 'deposit_withdraws.account_id', '=', 'mt_hululs.id')
            ->select(
                'deposit_withdraws.id',
                'deposit_withdraws.type',
                'deposit_withdraws.bank_name',
                'deposit_withdraws.recipient_name',
                'deposit_withdraws.account_number',
                'deposit_withdraws.Remittance_notices',
                'deposit_withdraws.amount_transferred',
                'deposit_withdraws.status',
                'deposit_withdraws.created_at',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $depositRequests;
        return view('admin.realAccount.Deposit&Withdraw.WithdrawRequest', compact('depositRequests'));
    }

    public function AcceptedWithdrawRequestPage()
    {

        // $depositRequests = DepositWithdraw::where('type', 'Deposit')->get();
        $depositRequests =  DB::table('deposit_withdraws')
            ->where('deposit_withdraws.type', '=', 'Withdraw')
            ->where('deposit_withdraws.status', '=', 'Accepted')
            ->join('users', 'deposit_withdraws.user_id', '=', 'users.id')
            ->join('mt_hululs', 'deposit_withdraws.account_id', '=', 'mt_hululs.id')
            ->select(
                'deposit_withdraws.id',
                'deposit_withdraws.type',
                'deposit_withdraws.bank_name',
                'deposit_withdraws.recipient_name',
                'deposit_withdraws.account_number',
                'deposit_withdraws.Remittance_notices',
                'deposit_withdraws.amount_transferred',
                'deposit_withdraws.status',
                'deposit_withdraws.created_at',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $depositRequests;
        return view('admin.realAccount.Deposit&Withdraw.AcceptedWithdrawRequest', compact('depositRequests'));
    }

    public function RejectedWithdrawRequestPage()
    {

        // $depositRequests = DepositWithdraw::where('type', 'Deposit')->get();
        $depositRequests =  DB::table('deposit_withdraws')
            ->where('deposit_withdraws.type', '=', 'Withdraw')
            ->where('deposit_withdraws.status', '=', 'Rejected')
            ->join('users', 'deposit_withdraws.user_id', '=', 'users.id')
            ->join('mt_hululs', 'deposit_withdraws.account_id', '=', 'mt_hululs.id')
            ->select(
                'deposit_withdraws.id',
                'deposit_withdraws.type',
                'deposit_withdraws.bank_name',
                'deposit_withdraws.recipient_name',
                'deposit_withdraws.account_number',
                'deposit_withdraws.Remittance_notices',
                'deposit_withdraws.amount_transferred',
                'deposit_withdraws.status',
                'deposit_withdraws.created_at',
                'users.name',
                'mt_hululs.login'
            )
            ->get();
        // return $depositRequests;
        return view('admin.realAccount.Deposit&Withdraw.RejectedWithdrawRequest', compact('depositRequests'));
    }
}
