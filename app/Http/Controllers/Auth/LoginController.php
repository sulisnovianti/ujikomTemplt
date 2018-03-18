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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticated($request, $user)
    {
        if($user->hasRole(['lab'])){
            return redirect('/admin/barangslab');
        }

        else if($user->hasRole(['bengkel'])){
            return redirect('/admin/barangsbengkel');
        }


        else if($user->hasRole(['admin'])){
            return redirect('/admin/barangs');
        }

        else{
            return redirect('/home');
        }

    }
}
