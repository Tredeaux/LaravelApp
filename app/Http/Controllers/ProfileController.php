<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    protected function index()
    {
        // if (Auth::check()) {
            $user = Auth::user();

            return view('profile',
                ['user' => $user]);
        // }
        // return redirect(route('index'));
    }
}
