<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class Authcontroller extends Controller
{
    public function index_login_admin()
    {
        return view('login.login');
    }

    function login_web_post(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'mssg' => 'Masukan data dengan benar']);
        }

        $data = [
            'username'     => $request->username,
            'password'  => $request->password,
        ];

        Auth::guard('web')->attempt($data);

        // dd($a);

        if (Auth::guard('web')->check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('index.admin');
        } else { // false
            return redirect()->route('login.admin.index')->with('error', true);
        }
    }
}
