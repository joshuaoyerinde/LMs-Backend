<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRegistrationController extends Controller
{
    //
    public function registerAdmin(Request $request)
    {
        return Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // return "jodhua";
    }
}
