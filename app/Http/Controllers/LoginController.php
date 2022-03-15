<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    protected function index()
    {
        $users = User::take(5)->get();
        return view('welcome', ['users' => $users]);
    }

    protected function login(Request $request)
    {
        // Get Email from Post
        $email = $request->input('email');

        // Verify is Email is there
        if (($email != null) or ($email != ''))
        {
            // Grab user with Email from DB
            $user = User::where('email', $email)->first();

            // If user with email exists
            if ($user != null) {
                // Move to Home page
                Auth::login($user);
                return redirect(route('home'));
            }
        }
        // If any checks fail stay on page
        return view('welcome');
    }

    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();

            try {
                $cat_fact = Http::get('http://catfact.ninja/fact/');
                $cat_fact = $cat_fact['fact'];
            } catch (\Exception) {
                $cat_fact = "Could not load a cat fact at this time.";
            } 

            $cat_image = Http::get('https://api.thecatapi.com/v1/images/search?size=full');

            $users = User::all();

            return view('home', [
                'user' => $user,
                'users' => $users,
                'cat_fact' => $cat_fact,
                'cat_image' => $cat_image]);
        }
        return redirect(route('login'));

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect(route('login'));

    }
}
