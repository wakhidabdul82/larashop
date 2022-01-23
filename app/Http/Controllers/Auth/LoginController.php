<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';
    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin/home';
        }
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Log the user out of the application.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        
        if(auth()->user()->role == 'admin') {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/admin');
        }elseif(auth()->user()->role =='customer')  {
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/');
        }else {
            return redirect('/');
        }
    }
}
