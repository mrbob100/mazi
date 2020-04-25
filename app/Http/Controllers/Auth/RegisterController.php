<?php

namespace Corp\Http\Controllers\Auth;

use Corp\User;
use Corp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Corp\Mail\ActivateAccount;
use Illuminate\Http\Request;

use Mail;
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

     protected $username='login';

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
            'name' => 'required|max:255',
            'secondname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone'=>'required|max:12',
            'address' => 'required|max:255',
            'captcha' => 'required|captcha',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'secondname' =>$data['secondname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone'=>$data['phone'],
            'address' => $data['address']
        ]);

    }

 /*   protected function registered(Request $request, $user)
    {
      return  Mail::to($user)->send(new ActivateAccount($user));

    }



    public function activation($userId, $token)
    {
        $user = User::findOrFail($userId);

        // Check token in user DB. if null then check data (user make first activation).
        if (is_null($user->remember_token)) {
            // Check token from url.
            if ( bcrypt($user->email) == $token) {
                // Change status and login user.
                $user->status = 1;
                $user->save();

                \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

                // Make login user.
                Auth::login($user, true);
            } else {
                // Wrong token.
                \Session::flash('flash_message_error', trans('interface.ActivatedWrong'));
            }
        } else {
            // User was activated early.
            \Session::flash('flash_message_error', trans('interface.ActivatedAlready'));
        }
        return redirect('/');
    } */
}
