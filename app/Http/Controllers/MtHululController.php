<?php

namespace App\Http\Controllers;

use App\Models\MtHulul;
use Tarikhagustia\LaravelMt5\LaravelMt5;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MtHululController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountInformations = ['balance' => null, 'equity' => null, 'freeMargin' => null];
        $accountsInformations = [];
        $userAccounts = MtHulul::all();
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
            $accountInformations['email'] = $demo->email;
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

        return view('admin.accounts.allUserAccounts', ['mtHulul' => $mtHulul, 'demos' => $accountsInformations]);
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
     * @param  \App\Models\MtHulul  $mtHulul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $accountInformations = ['balance' => null, 'equity' => null, 'freeMargin' => null];
        $accountsInformations = [];
        $userAccounts = MtHulul::Where('user_id', $id)->get();

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
            $accountInformations['email'] = $demo->email;
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
        // return $accountsInformations[0]['name'];

        return view('admin.accounts.UserAccounts', ['mtHulul' => $mtHulul, 'accountsInformations' => $accountsInformations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MtHulul  $mtHulul
     * @return \Illuminate\Http\Response
     */
    public function edit(MtHulul $mtHulul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MtHulul  $mtHulul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MtHulul $mtHulul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MtHulul  $mtHulul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mt = MtHulul::find($id);
        // return $mt->login;
        // $api = new LaravelMt5();
        // $api->deleteUser($mt->login);
        $mt->delete();

        session()->flash('account_deleted');
        // return session()->get('account_deleted') ;
        return back();
    }
}
