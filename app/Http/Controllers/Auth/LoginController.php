<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/profile';

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
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function attemptLogin(Request $request)
    {
        $isCredentialsValid = $this->guard()->validate($this->credentials($request));
        $errorMessageKey = 'auth.failed';

        if($isCredentialsValid) {
            $user = User::whereEmail($request->input('email'))->first();

            if($user !== null && $user->isConfirmed()) {
                return $this->guard()->attempt(
                    $this->credentials($request), $request->filled('remember')
                );
            }

            $errorMessageKey = 'auth.not_confirmed';
        }

        throw ValidationException::withMessages([
            $this->username() => [trans($errorMessageKey)],
        ]);
    }
}
