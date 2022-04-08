<?php

namespace App\Http\Controllers;

use App\Mail\UserEmail;
use App\Models\ManagerEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class ManagerEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = ManagerEmail::all();
        return view('admin.managers.ManagerEmail', compact('emails'));
    }
    public function sendEmail(Request $request, $id)
    {
        $body= $request['body'];
        $emails = ManagerEmail::all();

        $users = User::all();
        $email = ManagerEmail::find($id);
        // return $email;
        foreach ($users as $key => $user) {
            try {
                Mail::to($user->email)->send(new UserEmail($user, $body));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        Alert::success('Send Email', 'Send email successfully');
        return redirect(route('ManagerEmails.index'))->with(['emails'=>$emails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.managers.newEmail');
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
            'body' => ' required'
        ]);

        $body = $request['body'];

        $users = User::all();
        // return $users;
        ManagerEmail::create($input);
        foreach ($users as $key => $user) {
            try {
                Mail::to($user->email)->send(new UserEmail($user, $body));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        Alert::success('Send Email', 'Send email successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManagerEmail  $managerEmail
     * @return \Illuminate\Http\Response
     */
    public function show(ManagerEmail $managerEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManagerEmail  $managerEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(ManagerEmail $managerEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManagerEmail  $managerEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagerEmail $managerEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManagerEmail  $managerEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagerEmail $managerEmail)
    {
        //
    }
}
