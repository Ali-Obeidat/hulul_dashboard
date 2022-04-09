<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use RealRashid\SweetAlert\Facades\Alert;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $bonuses = Bonus::all();
        return view('admin.bonus.view_bonus',compact('bonuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
         $today =  Carbon::now()->toDateTimeString();
         $time = str_replace(' ','T',$today);
         return view('admin.bonus.create_bonus',compact('time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
       $bonus = new Bonus();
       $bonus->code = $request->code;
       $bonus->quantity = $request->quantity;
       $bonus->from = $request->from;
       $bonus->to = $request->to;
       $bonus->save();
        Alert::success('Add Bonus', 'Bonus Added Successfully');
        return redirect('bonus');
    }

    /**
     * Display the specified resource.
     *
     * @param Bonus $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Bonus $bonus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $today =  Carbon::now()->toDateTimeString();
        $time = str_replace(' ','T',$today);
        $bonus = Bonus::find($id);
        return \view('admin.bonus.edit_bonus',compact('bonus','time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id): Application|RedirectResponse|Redirector
    {
        $bonus = Bonus::find($id);
        $bonus->code = $request->code;
        $bonus->quantity = $request->quantity;
        $bonus->from = $request->from;
        $bonus->to = $request->to;
        $bonus->save();
        Alert::success('Edit Bonus', 'Bonus Edited Successfully');
        return redirect('bonus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id): Redirector|RedirectResponse|Application
    {
        $bonus = Bonus::find($id);
        $bonus->delete();
        Alert::error('Delete Bonus', 'Bonus Deleted ');
        return redirect('bonus');
    }
}
