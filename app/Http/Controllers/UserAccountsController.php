<?php

namespace App\Http\Controllers;

use App\Mail\AgreeddEmail;
use App\Models\MtHulul;
use App\Models\User;
use App\Models\UserAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Deposit_Withdraw = UserAccounts::with('user')->get();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAccounts  $userAccounts
     * @return \Illuminate\Http\Response
     */
    public function show(UserAccounts $userAccounts)
    {
        //
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAccounts  $userAccounts
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAccounts $userAccounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAccounts  $userAccounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // $requestStatus = $request['agreed'];

        $userAccount = UserAccounts::find($id);
        $userAccount->agreed = $request['agreed'];
        $userAccount->save();
        // return $userAccount['user_login'];

        try {
            Mail::to($userAccount->user->email)->send(new AgreeddEmail($userAccount));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAccounts  $userAccounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAccounts $userAccounts)
    {
        //
    }
}
