<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
		return view('Users/login');
	}
	public function login(Request $request)
	{
		$login = $request -> validate([
			'username' => 'required',
			'password' => 'required'	
		]);
		if (Auth::attempt($login))
		{
			$request->session()->regenerate();
			return redirect()->intended('/');
			$request->session()->flash('LoginSucces','Login berhasil');
		}
		return back()->with('ErorLogin','Login failed!');
	}
	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/login');
	}
	
}
