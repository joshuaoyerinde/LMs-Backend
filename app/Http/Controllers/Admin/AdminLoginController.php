<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
// use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function adminLogin(Request $request){
        $admin = new Admin;
        $email = $request->email;
        $pass = $request->password;
        $checkLogin = $admin::where(array('email'=>$email,'password'=>$pass))->get();
        if (!$checkLogin->count() > 0) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['success' => 'Login Successfully'], 200);

    }
    

}
