<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

    /*
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderCallback()
    {
        $sociliteUser = Socialite::driver('facebook')->user();
        $existUser=User::where('email',$sociliteUser->email)->first();
        if($existUser){
            Auth::login($existUser);
            return "loggedn in by old information";
        }else{
            $user=new User;
            $user->name=$sociliteUser->name;
            $user->email=$sociliteUser->email;
            $user->password=bycrpt(12345);
            $user->save;
            Auth::login($user);
            return "logged in by new information";
        }

    
    }

public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $user= Socialite::driver('google')->stateless()->user();
        return "done";
        

    
    }
    */

    public function redirectToProvider($name)
    {
        return Socialite::driver($name)->redirect();
    }
    public function handleProviderCallback($name)
    {
        $sociliteUser= Socialite::driver($name)->stateless()->user();
        $existUser=User::where('email',$sociliteUser->email)->first();
        if($existUser){
            Auth::login($existUser);
            return "loggedn in by old information";
        }else{
            $user=new User;
            $user->name=$sociliteUser->name;
            $user->email=$sociliteUser->email;
            $user->password=bycrpt(12345);
            $user->save;
            Auth::login($user);
            return "logged in by new information";
        }
        

    
    }

}
