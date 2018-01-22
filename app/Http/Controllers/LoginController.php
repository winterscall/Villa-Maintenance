<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Validator;
use App\User;

class LoginController extends Controller
{
    public function showLogin()
	{
	    return view('login');
	}

	public function doLogin(Request $request)
	{
		$validator = Validator::make($request->all(), User::$loginrules);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }

        //dd($request->all());

		if (Auth::attempt(['user_email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...

			return redirect()->intended('/');
        } else {        

        	// validation not successful, send back to form 
	        return redirect('login');

	    }
	}

	public function doLogout()
	{
		Auth::logout();
		
		return redirect('login');
	}
}
