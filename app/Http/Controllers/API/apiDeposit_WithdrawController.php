<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\AgreeddEmail;
use App\Models\UserAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class apiDeposit_WithdrawController extends Controller
{
    public function getAllDepositWithdraw()
    {
        
        $Deposit_Withdraw = UserAccounts::with('user')->get();

        return ['Deposit&Withdraw requests' =>$Deposit_Withdraw ];
    }

    public function update(Request $request,  $id)
    {
        // $requestStatus = $request['agreed'];

        $userAccount = UserAccounts::find($id);
        if ($userAccount->agreed == $request['agreed'] ) {
            return "The ". $userAccount->type ." request already ". $request['agreed'];
        }
        $userAccount->agreed = $request['agreed'];
        $userAccount->save();
        // return $userAccount['user_login'];

        try {
            
            Mail::to($userAccount->user->email)->send(new AgreeddEmail($userAccount));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $userAccount->type. " request was " .$request['agreed'] ;
    }
}
