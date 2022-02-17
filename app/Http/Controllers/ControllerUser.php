<?php

namespace App\Http\Controllers;

use App\Models\ZUser;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class ControllerUser extends Controller
{
    public function login(Request $request)
    {
        try
        {
            $email = $request->email;
            $password = $request->password;
            $user = ZUser::where('email', $email)->take(1)->get()[0];
            $saltedPassword = $password . $user->salt;

            if(Controller::comparePassword($saltedPassword, $user->password) == 1)
            {
                /*
                if ($user->emailConfirmed == 1)
                {
                    $user->lastConnection = now()->timestamp;
                    return view('home');
                    //return response()->json(['message'=> "Profile found", 'success' => true, 'status' => "Login succeeded"], 200);
                }
                return response()->json(['message'=> "Email must be confirmed to be able to access this account", 'success' => false, 'status' => "login Failed", 'id' => null], 400); 
                */
                $user->lastConnection = now()->timestamp;
                return view('home', ['user' => $user]);
            }
            return response()->json(['message'=> "Incorrect password", 'success' => false, 'status' => "login Failed", 'id' => null], 404);
        }
        catch (Exception $e)
        {
            return response()->json(['message'=> "Profile not found $e", 'success' => false, 'status' => "Request Failed", 'id' => null, 'Exception' => $e], 404);
        }
    }

    public function register(Request $request)
    {
        $user = new ZUser;
        $salt = Str::random(40);

        if (is_null($request->email) || 
        is_null($request->password) || 
        is_null($request->username))
        { 
            return response()->json(['message'=> "One of the field is empty, you must fill them all or the field's name aren't right", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }
        else if (is_null($salt))
        { 
            // return view error
            return response()->json(['message'=> "A problem has been encountered while creating the salt", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $saltedPassword = $request->password . $salt;

        $user->salt = $salt;
        $user->password = Controller::hashPassword($saltedPassword);
        $user->emailConfirmed = false;

        try
        {
            $user->save();
            return view ('login');
            //return view('confirmMail');
        }
        catch (Exception $e)
        {
            // return la view error
            return response()->json(['message'=> "We've encountered problems while saving data in the database or there is no connection with the database", 'success' => false, 'status' => "Request Failed", 'id' => null], 400);
        }

    }
}
