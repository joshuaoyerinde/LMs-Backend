<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Admin;

class AdminRegistrationController extends Controller
{
    //
    public function registerAdmin(Request $request)
    {
        return Admin::create([
            'email' => $request->email,
            'password' => $request->password
        ]);
        // return "jodhua";
    }
}
