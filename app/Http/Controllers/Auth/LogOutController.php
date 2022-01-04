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
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request request
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }

}
