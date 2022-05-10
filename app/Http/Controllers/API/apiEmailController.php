<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\UserEmail;
use App\Models\ManagerEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class apiEmailController extends Controller
{
    public function getAllEmails()
    {
        $emails = ManagerEmail::all();
        return ['all emails'=>$emails];
    }
    public function create(Request $request)
    {
        $input = $request->validate([
            'body' => ' required'
        ]);

        $body = $request['body'];

        $users = User::all();
        // return $users;
        ManagerEmail::create($input);
        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new UserEmail($user, $body));
            try {
            } catch (\Throwable $th) {
                //throw $th;
            }
        }


        return 'Send email successfully';
    }

    public function sendEmail( $id)
    {
        $users = User::all();
        $email = ManagerEmail::find($id);
        foreach ($users as $key => $user) {
            try {
                Mail::to($user->email)->send(new UserEmail($user, $email['body']));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return "email sent";
    }
}
