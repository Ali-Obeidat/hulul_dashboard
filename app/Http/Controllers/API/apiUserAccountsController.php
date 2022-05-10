<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MtHulul;
use Tarikhagustia\LaravelMt5\LaravelMt5;
use Illuminate\Http\Request;

class apiUserAccountsController extends Controller
{
    public function getUserAccounts($id)
    {
        // return $id;
        $accountInformations = ['balance' => null, 'equity' => null, 'freeMargin' => null];
        $accountsInformations = [];
        $userAccounts = MtHulul::Where('user_id', auth()->user()->id)->get();

        $api = new LaravelMt5();
        foreach ($userAccounts as $demo) {

                $user = $api->getTradingAccounts($demo->login);
                // $balance = $user->Balance;
                // $equity = $user->Equity;
                // $freeMargin = $user->MarginFree;

                $accountInformations['balance'] = $user->Balance;
                $accountInformations['equity'] = $user->Equity;
                $accountInformations['freeMargin'] = $user->MarginFree;
                $accountInformations['login'] = $user->Login;
                $accountInformations['name'] = $demo->name;
                $accountInformations['id'] = $demo->id;
                $accountInformations['leverage'] = $demo->leverage;
                $accountInformations['group'] = $demo->group;
                $accountInformations['created_at'] = date('d/m/Y', strtotime($demo->created_at));

                array_push($accountsInformations, $accountInformations);



        }
     
        try {
            $mtHulul = MtHulul::Where('user_id', $id)->get();
        } catch (\Throwable $th) {
            $mtHulul = '';
        }
        

        return  ['mtHulul' => $mtHulul,'accountsInformations'=>$accountsInformations];
    }

    public function getAllAccounts()
    {
        $accountInformations = ['balance' => null, 'equity' => null, 'freeMargin' => null];
        $accountsInformations = [];
        $userAccounts = MtHulul::Where('user_id', auth()->user()->id)->get();

        $api = new LaravelMt5();
        foreach ($userAccounts as $demo) {

                $user = $api->getTradingAccounts($demo->login);
                // $balance = $user->Balance;
                // $equity = $user->Equity;
                // $freeMargin = $user->MarginFree;

                $accountInformations['balance'] = $user->Balance;
                $accountInformations['equity'] = $user->Equity;
                $accountInformations['freeMargin'] = $user->MarginFree;
                $accountInformations['login'] = $user->Login;
                $accountInformations['name'] = $demo->name;
                $accountInformations['id'] = $demo->id;
                $accountInformations['leverage'] = $demo->leverage;
                $accountInformations['group'] = $demo->group;
                $accountInformations['created_at'] = date('d/m/Y', strtotime($demo->created_at));
                array_push($accountsInformations, $accountInformations);
        }
    
        try {
            $mtHulul = MtHulul::all();
        } catch (\Throwable $th) {
            $mtHulul = '';
        }

        return ['accountsInformations'=>$accountsInformations,'mtHulul' => $mtHulul];
    }

    public function destroy( $id)
    {
        $mt = MtHulul::find($id);
        // return $mt->login;
        // $api = new LaravelMt5();
        // $api->deleteUser($mt->login);
        $mt->delete();
        
        return 'account_deleted';
        return back();
    }
}
