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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(\App\User::count()==0)
        {
            $user = \App\User::create(
            [
                'slug'      =>  'chafik', 
                'name'      =>  'chafik', 
                'email'     =>  'chafik@is-allin.com', 
                'password'  =>  bcrypt('chafik')
            ]);
            $role  = \App\Models\Role::create(['name'=>'superadmin']);
            \App\Models\Role::create(['name'=>'admin']);
            $user->roles()->attach($role->id);
            echo ('Superadmin créé:<br>Email: chafik@is-allin.com<br>Mot de passe:chafik');
            dd('');
        }
        $this->middleware('guest')->except('logout');
    }
}
