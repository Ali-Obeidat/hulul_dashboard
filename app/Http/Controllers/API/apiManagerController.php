<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class apiManagerController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required| email| max:255',
            'password'=> 'required',
        ]);
        
        $manager = Manager::create([
            'name'=> $input['name'],
            'email'=> $input['email'],
            'password'=> Hash::make($input['password']) ,
        ]);

        return "manager created";
    }

    public function getAllManagers()
    {
        $managers = Manager::all();
        return ['managers'=>$managers];
    }

    public function update(Request $request,  $id)
    {
        $manager = Manager::find($id);
        $input = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required| email| max:255',
            
        ]);
        $manager->name =$input['name']; 
        $manager->email =$input['email']; 
        if ($request['password'] !==null) {
            
            $manager->password = Hash::make($request['password']); 
        }
        $manager ->save();
        return 'manager_updated';

       
    }
    public function destroy( $id)
    {
        try {
            $manager = Manager::find($id);
            $manager->delete();
            return 'manager deleted';
        } catch (\Throwable $th) {
           return "this manager not exists";
        }
       
    }
}
