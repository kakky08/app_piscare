<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();
        $user = User::where('email', $providerUser->getEmail())->first();

        if ($user) {
            $this->guard()->login($user, true);
            return $this->sendLoginResponse($request);
        }

        $email = $providerUser->getEmail();
        $token = $providerUser->token;

        return redirect()->route('register.{provider}', compact('provider', 'email', 'token'));
    }

    public function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }

    private const GEST_USER_ID = 1;

    public function guestLogin()
    {
        if(Auth::loginUsingId(self::GEST_USER_ID))
        {
            return redirect('/home');
        }
        return redirect('/');
    }
}
