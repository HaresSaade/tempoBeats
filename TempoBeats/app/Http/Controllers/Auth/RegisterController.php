<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DateTime;

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
    protected $redirectTo = RouteServiceProvider::EmV;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function mustVerifyEmail()
    {
        return false;
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $requireVerification = config('auth.registration.require_verification');
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', Rule::in(['Male', 'Female','Other', null])],
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/','max:16', 'confirmed'],
        ];
        if ($requireVerification) {
            $rules['email'] = array_merge($rules['email'], ['unique:users,email_verified_at,NULL']);
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $birthday = new DateTime($data['birthday']);
        $today = new DateTime();
        $age = $today->diff($birthday)->y;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'Gender' => $data['gender'],
            'Age' => $age,
            'password' => Hash::make($data['password']),
        ]);
        if (config('auth.registration.require_verification')) {
            $user->sendEmailVerificationNotification();
        }
        return $user;
    }
}
