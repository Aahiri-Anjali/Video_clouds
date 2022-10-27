<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\NotifyMailJob;
use App\Mail\NotifyMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return  Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'cpassword' => ['required', 'same:password'],
            'fname' => ['required', 'alpha'],
            'lname' => ['required', 'alpha'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png'],
            'country' => ['required', 'alpha'],
            'state' => ['required', 'alpha'],
            'city' => ['required', 'alpha'],
            'address' => ['required'],
            'mobile' => ['required', 'numeric', 'min:11'],
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
        if (isset($data['image'])) {
            $filename = time() . $data['image']->getClientOriginalName();
            $data['image']->move(public_path() . '/upload/', $filename);
            $image = $filename;
        }

          NotifyMailJob::dispatch($data['email'], $data['fname']);

          return  User::create([
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country_code' => $data['country_code'] ?? 91,
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
            'mobile' => $data['mobile'],
            'image' => $image,
        ]);

    }
}
