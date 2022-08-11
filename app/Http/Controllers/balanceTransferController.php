<?php

namespace App\Http\Controllers;

use App\Models\BalanceTransfer;
use App\Models\Notification;
use Illuminate\Http\Request;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Tarikh\PhpMeta\Lib\MTUserProtocol;
use Tarikhagustia\LaravelMt5\Entities\Trade;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\DB;
use App\Events\Notifications;


class balanceTransferController extends Controller
{
    public function index()
    {
        $requests = BalanceTransfer::all();
        return view('admin.requests.transferBalance.index', compact('requests'));
    }
    public function updateBalanceTransferStatus(Request $request, $id)
    {
        $Api = new LaravelMt5();
        $balance = BalanceTransfer::find($id);
       
        if ($request['status'] == 'Accepted') {

            try {
                //Subtract the balance from second account
                new  MTUserProtocol($Api);
                $Api->conductUserBalance($balance['First_account_login'], Trade::DEAL_BALANCE, (int)(-$balance['Balance_amount']), 'aaaaaa');
            } catch (\Throwable $th) {
                //throw $th;
            }
            //secondAccount
            try {
                //add balance to second account
                new  MTUserProtocol($Api);
                $Api->conductUserBalance($balance['second_account_login'], Trade::DEAL_BALANCE, (int)($balance['Balance_amount']), 'aaaaaa');
            } catch (\Throwable $th) {
                //throw $th;
            }

            $langs = ['ar', 'en'];
            $transBody = [];
            $title = 'accept-transfer-balance-real-account';
            $body = 'The admin accept your request to transfer: ' . $balance['Balance_amount'] . ' from: ' . $balance['First_account_login'] . ' to: ' . $balance['second_account_login'];
            $image = 'card-send';
            $info = [];
            foreach ($langs as $lang) {
                $tr = new GoogleTranslate($lang, null);
                //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                array_push($transBody, [$lang => $tr->translate($body)]);
            }

            event(new Notifications($title, $transBody, $balance->user_id, $image, $info));

            Notification::create([
                'user_id' => $balance->user_id,
                'title' => $title,
                'notification_body' => $body,
                'notification_image' => $image,
                'info' => $info,
            ]);
            $balance->status = 'Accepted';
            $balance->save();
            return back()->with('success', 'You accept the request to transfer: ' . $balance['Balance_amount'] . ' from: ' . $balance['First_account_login'] . ' to: ' . $balance['second_account_login']);
        }
        if ($request['status'] == 'Rejected') {
            $langs = ['ar', 'en'];
            $transBody = [];
            $title = 'reject-transfer-balance-real-account';
            $body = 'The admin reject your request to transfer: ' . $balance['Balance_amount'] . ' from: ' . $balance['First_account_login'] . ' to: ' . $balance['second_account_login'];
            $image = 'card-send';
            $info = [];
            foreach ($langs as $lang) {
                $tr = new GoogleTranslate($lang, null);
                //  $transBody = [...$transBody, $lang => $tr->translate($body)];
                array_push($transBody, [$lang => $tr->translate($body)]);
            }

            event(new Notifications($title, $transBody, $balance->user_id, $image, $info));

            Notification::create([
                'user_id' => $balance->user_id,
                'title' => $title,
                'notification_body' => $body,
                'notification_image' => $image,
                'info' => $info,
            ]);
            $balance->status = 'Rejected';
            $balance->save();
            return back()->with('error', 'You reject the request to transfer: ' . $balance['Balance_amount'] . ' from: ' . $balance['First_account_login'] . ' to: ' . $balance['second_account_login']);

        }
        
    }
}
