<?php

/**
 * Login Admin
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('backend.auth.login');
    }

    /**
     * Contruct Properties
     * 
     * @param App\Http\Requests\User\LoginRequest $request validate
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        
        $user = $request->validated();
        if (Auth::attempt($user) === true) {
            return redirect()->route('dashboard.show');
        } else {
            return redirect()->route('login.index');
        }
    }
}
