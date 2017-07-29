<?php

namespace App\Http\Controllers;

use App\Events\onAddOrderSocialEvent;
use Illuminate\Http\Request;
use App\User;
use App\Models\Order;
use Auth;
use Hash;
use Redirect;
use Session;
use Event;
use Validator;

class UloginController extends Controller
{


    public function login(Request $request)
    {
        $user = Auth::user();
        if ($user) return redirect('');
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $request->get('token') .
            '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, true);
        $session =session('cart');
        $order = new Order();
        // Check exist email.
        if (isset($user['email']) && !empty($user['email'])) {
            // Find user in DB.
         //   $userData = User::where('email', $user['email'])->first();

            // Check exist user.
         //   if ($userData) {
                // Check user status.
                /* if ($userData->status) {
                     // Make login user.
                     Auth::loginUsingId($userData->id, true);

                 } else {
                     // Wrong status.
                     \Session::flash('flash_message_error', trans('interface.AccountNotActive'));
                 }

                 return Redirect::back();
             } else {
                 // Make registration new user.

                 // Create new user in DB.
                 $newUser = User::create([
                     'nik' => $user['nickname'],
                     'name' => $user['first_name'] . ' ' . $user['last_name'],
                     'country' => $user['country'],
                     'email' => $user['email'],
                     'password' => Hash::make(str_random(8)),
                     'role' => 'user',
                     'status' => true,
                     'ip' => $request->ip()
                 ]);

                 // Make login user.
                 Auth::loginUsingId($newUser->id, true);

                 \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

                 return Redirect::back();
             } */
            $messages=[];
               $validator= Validator::make($user,[
                    'first_name'=>'required|max:255',
                    'last_name'=>'required|max:255',
                    'email'=>'required|email',
                    'phone'=>'required||min:10',
                    'address'=>'required|max:255'
                ],$messages );
                if($validator->fails()) redirect()->route('arrangeContract')->withErrors($validator)->withInput();
                $order->name = $user['first_name'];
                $order->email = $user['email'];
                $order->phone = $user['phone'];
                $order->secondname = $user['last_name'];

            //    $order->address =$user['address'];
         //     Event::fire(new onAddOrderSocialEvent($old));
           return view('cart.view11', ['order'=>$order] );
         //  }

          //  \Session::flash('flash_message_error', trans('interface.NotEmail'));

           // return Redirect::back();

        }
        \Session::flash('flash_message_error', trans('interface.NotEmail'));
    }
}
