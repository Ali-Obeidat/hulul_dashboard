<?php

namespace App\Http\Controllers;

use App\Models\PublicBonuse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PublicBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Bonuses = PublicBonuse::all();
        // return $Bonuses;
        return view('admin.bonus.publicBonus.index', compact('Bonuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bonus.publicBonus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required',
        ]);
        PublicBonuse::create([
            'status' => 'inactive',
            'quantity' => $request['quantity'],
        ]);

        Alert::success('Add Bonus', 'Bonus Added Successfully');
        return redirect(route('public-Bonus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonus = PublicBonuse::find($id);
        return view('admin.bonus.publicBonus.edit', compact('bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $bonus = PublicBonuse::find($id);
        $bonus->status = $request['status'];
        $bonus->quantity = $request['quantity'];
        $bonus->save();
        Alert::success('Edit Bonus', 'Bonus Edited Successfully');
        return redirect(route('public-Bonus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bonus = PublicBonuse::find($id);
        $bonus->delete();
        Alert::error('Delete Bonus', 'Bonus Deleted ');
        return redirect(route('public-Bonus.index'));
    }
}
