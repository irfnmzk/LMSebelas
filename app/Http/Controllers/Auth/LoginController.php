<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->user();

        $hasUser = \App\User::where('email', $user->getEmail())->first();

        if($hasUser){
            Auth::login($hasUser);
            return redirect('dashboard');
        }
        else{
            $newUser = \App\User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'picture' => $user->getAvatar(),
                'password' => bcrypt(microtime()),
            ]);
            Auth::login($newUser);
            return redirect('dashboard');
        }
    }
}
