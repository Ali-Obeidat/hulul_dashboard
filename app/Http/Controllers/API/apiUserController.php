<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class apiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetAllUsers()
    {
        $users = User::whereNot('type','company')->get();
        // dd($users) ;
        $userCount= count($users );
        return ['users'=>$users,'userCount'=>$userCount];
    }

    public function GetCompanyUsers()
    {
        $users = User::where('type','company')->get();
        // dd($users) ;
        $userCount= count($users );
        return ['companyUsers'=>$users,'userCount'=>$userCount];
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
        //
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
        // return $id;

        $inputs = $request->validate([

            'name'=> 'required|string|max:255',
            'email'=> 'required| email| max:255',
            'phone'=> 'required',
            'country'=> 'required',
            'type'=> 'required',
            

        ]);
        // return $inputs['name']; 
        $user = User::find($id);

        $user->name =$inputs['name']; 
        $user->email =$inputs['email']; 
        $user->phone =$inputs['phone']; 
        $user->country =$inputs['country']; 
        $user->type =$inputs['type']; 
        if ($request['password'] !==null) {
            
            $user->password = Hash::make($request['password']); 
        }

        $user ->save();

        return "user updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::find($request['user_id']);
        $user->delete();
        
        return "User Deleted";
        } catch (\Throwable $th) {
            return 'this user not exist';
        }
        
    }
}
