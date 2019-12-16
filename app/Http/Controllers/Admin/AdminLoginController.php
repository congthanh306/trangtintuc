<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\loginReq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	public function getLogin()
	{
		return view('admin.adminLogin.login');
	}

	public function login(loginReq $request)
	{
		$account = array(
			'email' => $request->input('email'),
			'password' => $request->input('password')
		);

		if(Auth::attempt($account))
		{
			if(Auth::user()->role == 1)
			{
				return redirect()->route('admin.dashboard');
			}else{
				return redirect()->route('login.getlogin')->withWarning('You are not authorized to login');
			}
		}
		return back()->with('message', "Account doesn't exist");
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('login.getlogin');
	}
}
