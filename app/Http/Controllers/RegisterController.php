<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Log;


class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('index'));
        }
        return view('register'); 
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('index'));
        }

        $name = $request->input('name', null);
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $password2 = $request->input('password2', null);

        // Verify if Email is there
        if (($email == null) or ($email == ''))
        {
            Session::flash('message', 'Email is not valid'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect(route('register'));
        }

        // Verify if Name is there
        if (($name == null) or ($name == ''))
        {
            Session::flash('message', 'Name is not valid'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect(route('register'));
        }

        // Verify if Password is there
        if ((strlen($password2) >= 8) and ($password != $password2)) 
        {
            Session::flash('message', 'Passwords are not valid'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect(route('register'));
        }

        // Try creating User
        try {
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();

            Log::info("User: " . $user->id . " has been created!");
            Auth::login($user);

          } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('message', 'Sorry, We could not create your profile at this time'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect(route('register'));
          } 

        return redirect(route('home'));
    }

}
