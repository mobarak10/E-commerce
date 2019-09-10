<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VarifyRegistration;
use App\Models\User;
use Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);

        //find user by this email
        $user = User::where('email', $request->email)->first();
        if ($user->status == 1) {

            //Login this user
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                //Log him now
                session()->flash('success', 'Login Successfully');
                return redirect()->intended(route('index'));
            }else{

                session()->flash('has_error', 'Email or Password is incorrect');
                return back();
            }
        }else{

            //send him token again if email is exist
            if (!is_null($user)) {

                $user->notify(new VarifyRegistration($user));
                session()->flash('success', 'A new confirmation email sent please check and confirm');
                return redirect('/');
            }else{

                session()->flash('has_error', 'Please Login first');
                return redirect()->route('login');
            }

        }
    }
}
