<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Store;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        $store = new Store();
        $data = [];
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password');
        $data['active'] = $store->isActive($request->input('email'));
        $validator = Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
            'active' => 'in:1'
            ]);
        
        if ($validator->fails()) { return redirect('login')->withErrors($validator)->withInput(); }

        if(!Auth::attempt($request->only('email', 'password')))
        {
            return redirect('login');
        }
    
        return redirect('home');
    }
}
