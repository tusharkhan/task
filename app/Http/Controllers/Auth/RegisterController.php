<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'shop_name' => ['required', 'string', 'max:255', 'unique:shops,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:merchants,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $merchantData = [
            'name' => $data['name'],
            'email' => $data['email']
        ];

        $merchant = Merchant::create($merchantData);

        $shopInformation = [
            'merchant_id' => $merchant->id,
            'name' => $data['shop_name'],
            'slug' => Str::slug($data['shop_name']) . '-' . Str::random(10),
            'password' => Hash::make($data['password']),
        ];

        return Shop::create($shopInformation);
    }

    protected function guard()
    {
        return Auth::guard('merchant');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $merchant = Merchant::where("email", $request->email)->first();

        if ($merchant) {
            return redirect()->back()->with('error', 'Email already exists');
        }


        if($this->create($request->all())){
            return redirect()->route('merchant.login.get')->with('success', 'Register successfully');
        }
    }
}
