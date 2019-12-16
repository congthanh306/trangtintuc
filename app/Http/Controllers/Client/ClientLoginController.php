<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\loginClientReq;
use Illuminate\Support\Facades\DB;
class ClientLoginController extends Controller
{
	public function login(Request $request)
	{	
		$account = array(
			'email' => $request->input('email'),
			'password' => $request->input('password')
		);

		if(Auth::attempt($account))
		{
			if(Auth::user())
			{	
				$user = Auth::user();
				return redirect()->back();
			}
		}
		return back()->with('message', "Account doesn't exist");
	}

	public function logout(){
		Auth::logout();
		return redirect()->back();
	}
}
