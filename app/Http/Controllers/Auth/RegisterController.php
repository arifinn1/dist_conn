<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Store;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'store_name' => 'required|string|max:200',
            'address' => 'required|string',
            'title' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function register(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:200',
            'address' => 'required|string',
            'title' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
        
        $store = new Store();
        $store_data = [];
        $store_data['id'] = $store->IdGenerator();
        $store_data['name'] = $request->input('store_name');
        $store_data['address'] = $request->input('address');
        $store->insert($store_data);
        
        $user = new User();
        $user_data = [];
        $user_data['title'] = $request->input('title');
        $user_data['name'] = $request->input('name');
        $user_data['store_id'] = $store_data['id'];
        $user_data['email'] = $request->input('email');
        $user_data['password'] = bcrypt($request->input('password'));
        $user->insert($user_data);

        $data = [];
        $data['title'] = $user_data['title'];
        $data['name'] = $user_data['name'];
        $data['store_name'] = $store_data['name'];

        return view('auth/register_success', $data);
    }

    public function success()
    {
        $data = [];
        $data['title'] = 'Mr';
        $data['name'] = 'Albert Yuga';
        $data['store_name'] = 'Albert Store';

        return view('auth/register_success', $data);
    }
}
