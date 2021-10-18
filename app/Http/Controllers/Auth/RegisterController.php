<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'phone'     => ['required', 'string', 'max:255'],
            'skill'     => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'level'     => ['required', 'string', 'max:150'],
            'password'  => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
    // return $request->email;
    $token = mt_rand(1000,99998902345);
    // $verify = "false";
    $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'skill' => $request->skill,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
            'token' => $token,
            // 'verify	' => $verify
        ]);
        if ($user) {
            // User::find();
            $to_name = $request->firstname;
            $to_email = $request->email;
            $data = array('name'=>$request->firstname, "body" => "Test mail", "token"=>$token);
            Mail::send('emails', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('LMS verification');
                $message->from('oyerindejoshua133@gmail.com','Uriel LMS');
            });
            // return view('emails')->with('token',$token);      
            return response()->json(['response' => 'Register sucesssful','token'=>$token], 200);
        }else{
            return response()->json(['error' => 'inavlid'], 500); 
        }  
    }
      /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function verifyemail(Request $request)
    {
        $user = new User;
        $verify = "true";                         
        $token= $request->tokenize;
        $tokenToString = strval($token);  
        $user->where('token', $tokenToString)->update(array('verify' => $verify));
        $findUser = $user->where('token', $tokenToString)->get();
        return $findUser;
    }
}
