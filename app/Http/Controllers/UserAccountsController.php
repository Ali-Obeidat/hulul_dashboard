<?php

namespace App\Http\Controllers;

use App\Mail\AgreeddEmail;
use App\Models\DepositWithdraw;
use App\Models\MtHulul;
use App\Models\User;
use App\Models\UserAccounts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        /** @var DepositWithdraw $Deposit_Withdraw */
        $Deposit_Withdraw = DepositWithdraw::with('user')->get();
        // return $Deposit_Withdraw  ;
        return view('admin.requests.DepositWithdraw', compact('Deposit_Withdraw'));
    }


    public function DepositWithdrawFilter(Request $request)
    {
        $requestStatus = $request['agreed'];
        // return 'asdasdsad';
        if ($requestStatus == 'all') {
            $Deposit_Withdraw = UserAccounts::with('user')->get();
            // return $Deposit_Withdraw  ;
            return view('admin.requests.DepositWithdraw', compact('Deposit_Withdraw', 'requestStatus'));
        }
        $Deposit_Withdraw = UserAccounts::with('user')->where('agreed', $requestStatus)->get();
        // return $Deposit_Withdraw  ;
        return view('admin.requests.DepositWithdraw', compact('Deposit_Withdraw', 'requestStatus'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserAccounts $userAccounts
     * @return string
     */
    public function update(Request $request, $id)
    {
        // $requestStatus = $request['agreed'];
        /** @var DepositWithdraw $Deposit_Withdraw */
        $Deposit_Withdraw = DepositWithdraw::find($id)->first();
        if ($Deposit_Withdraw->agreed === $request['agreed']) {
            return "The " . $Deposit_Withdraw->type . " request already " . $request['agreed'];
        }
        $Deposit_Withdraw->agreed = $request['agreed'];
        $Deposit_Withdraw->save();
        // return $userAccount['user_login'];

        try {
            Mail::to($Deposit_Withdraw->user->email)->send(new AgreeddEmail($Deposit_Withdraw));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserAccounts $userAccounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAccounts $userAccounts)
    {
        //
    }
}
