<?php

namespace App\Http\Controllers;

use App\Models\MtHulul;
use Illuminate\Http\Request;

class MtHululController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $accountInformations = ['balance' => null, 'equity' => null, 'freeMargin' => null];
        // $accountsInformations = [];
        // $userAccounts = MtHulul::Where('user_id', auth()->user()->id)->get();

        // $api = new LaravelMt5();
        // foreach ($userAccounts as $demo) {

        //         $user = $api->getTradingAccounts($demo->login);
        //         // $balance = $user->Balance;
        //         // $equity = $user->Equity;
        //         // $freeMargin = $user->MarginFree;

        //         $accountInformations['balance'] = $user->Balance;
        //         $accountInformations['equity'] = $user->Equity;
        //         $accountInformations['freeMargin'] = $user->MarginFree;
        //         $accountInformations['login'] = $user->Login;
        //         $accountInformations['name'] = $demo->name;
        //         $accountInformations['id'] = $demo->id;
        //         $accountInformations['leverage'] = $demo->leverage;
        //         $accountInformations['group'] = $demo->group;
        //         $accountInformations['created_at'] = date('d/m/Y', strtotime($demo->created_at));

        //         array_push($accountsInformations, $accountInformations);


        //     // return $accountsInfo;

        // }
        // dd('hhj');
        // try {
        //     $accountsInfo = $this->AccPaginate($accountsInformations);
        //     $accountsInfo->withPath("/demos");
        // } catch (\Throwable $th) {
        //     $mtHulul = '';
        // }

        $mtHulul = MtHulul::all();

        // return view('clientDashboard.accountPage', ['mtHulul' => $mtHulul, 'demos' => $accountInformations, 'accountsInfo' => $accountsInfo]);
        return view('admin.accounts.allUserAccounts', ['mtHulul' => $mtHulul]);
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
        // $accountInformations = ['balance' => null, 'equity' => null, 'freeMargin' => null];
        // $accountsInformations = [];
        // $userAccounts = MtHulul::Where('user_id', auth()->user()->id)->get();

        // $api = new LaravelMt5();
        // foreach ($userAccounts as $demo) {

        //         $user = $api->getTradingAccounts($demo->login);
        //         // $balance = $user->Balance;
        //         // $equity = $user->Equity;
        //         // $freeMargin = $user->MarginFree;

        //         $accountInformations['balance'] = $user->Balance;
        //         $accountInformations['equity'] = $user->Equity;
        //         $accountInformations['freeMargin'] = $user->MarginFree;
        //         $accountInformations['login'] = $user->Login;
        //         $accountInformations['name'] = $demo->name;
        //         $accountInformations['id'] = $demo->id;
        //         $accountInformations['leverage'] = $demo->leverage;
        //         $accountInformations['group'] = $demo->group;
        //         $accountInformations['created_at'] = date('d/m/Y', strtotime($demo->created_at));

        //         array_push($accountsInformations, $accountInformations);


        //     // return $accountsInfo;

        // }
        // dd('hhj');
        // try {
        //     $accountsInfo = $this->AccPaginate($accountsInformations);
        //     $accountsInfo->withPath("/demos");
        // } catch (\Throwable $th) {
        //     $mtHulul = '';
        // }

        // $mtHulul = MtHulul::all();
        $mtHulul = MtHulul::Where('user_id', $id)->get();

        // return view('clientDashboard.accountPage', ['mtHulul' => $mtHulul, 'demos' => $accountInformations, 'accountsInfo' => $accountsInfo]);
        return view('admin.accounts.UserAccounts', ['mtHulul' => $mtHulul]);
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
    public function destroy(MtHulul $mtHulul)
    {
        //
    }
}
