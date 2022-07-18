<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Pusher\Pusher;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = Manager::all();
        // return $users;
        return view('admin.managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.managers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required| email| max:255',
            'password' => 'required',
        ]);
        $manager = Manager::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['message' => 'new manager was created'];
        $pusher->trigger('notifications' . auth()->user()->id, 'Notifications', $data);
        session()->flash('manager_created');

        return redirect(route('Managers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = Manager::find($id);

        return view('admin.managers.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $manager = Manager::find($id);
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required| email| max:255',

        ]);
        $manager->name = $input['name'];
        $manager->email = $input['email'];
        if ($request['password'] !== null) {

            $manager->password = Hash::make($request['password']);
        }
        $manager->save();
        session()->flash('manager_updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manager = Manager::find($id);
        $manager->delete();
        session()->flash('manager_deleted');
        return back();
    }
}
