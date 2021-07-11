<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendOTP;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\UserTemporary;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     // 'name' => 'required|string|max:255',
        //     // 'email' => 'required|string|email|max:255|unique:users',
        //     // 'password' => 'required|string|confirmed|min:8',
        // ]);

        $validator = Validator::make($request->all(), [
            'nick_name' => 'required|string|max:255',
            'phone_number' => 'required|unique:users|string|max:64',
            'email' => 'required|string|email|max:255|unique:users',
        ],[
            'phone_number.unique' => 'Phone number already registered. Please login.',
            'email.unique' => 'Email already registered. Please login or try another.',
        ]);
        

         if($validator->fails()){
            $data = [
                'status' => 'error', 
                'type' => 'Validation Error',
                'message' => 'Validation error, please check back your input.' ,
                'error_list' => $validator->messages() ,
            ];
            return json_encode($data);
         }
     
        $otp = rand(1000,9999);
        $otp_expired = date("Y-m-d h:i:s", time() + 300);

        $user_temporary = UserTemporary::create([
            'nick_name' => $request->nick_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'otp' => $otp,
            'otp_expired' => $otp_expired,
        ]);

        $content = "Your verification code is ".$otp." and will expired on ".date('j F Y, g:i a' , strtotime($otp_expired))."";
        Notification::notificationSMS($request->phone_number,$content);
        try {
            Mail::to($user_temporary)->send(new SendOTP($otp));
        } catch (\Throwable $th) {
            throw $th;
        }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        $data = [
            'status' => 'success', 
            'message' => 'Successfully request OTP' ,
            'user_id' => $user_temporary->id,
        ];
        return json_encode($data);
    }


}
