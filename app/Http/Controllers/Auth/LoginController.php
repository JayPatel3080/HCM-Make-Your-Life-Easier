<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    // protected function redirectTo()
    // {
    //     if (auth()->user()->role === 'patient') {
    //         return '/patient';
    //     } elseif (auth()->user()->role === 'doctor') {
    //         return '/doctor';
    //     } elseif (auth()->user()->role === 'staff') {
    //         return '/staff';
    //     } else {
    //         // Handle other roles or set a default redirect
    //         return '/admin';
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
