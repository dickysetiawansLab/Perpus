<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
	public function index(){
		return view('Users/index');
	}
	public function edit(Request $request){
		$id = Auth::user()->id;
		$nama = Auth::user()->username;
		$users = $request -> validate([
			'username'=>'required|unique:users',
			'kode_user' =>'required|unique:users',
			'nis'=>'required|unique:users',
			'fullname'=>'required',
			'kelas'=>'required',
			'alamat'=>'required',
		]);
		$user = User::find($id);
		$user->username = $users['username'];
		$user->kode_user = $users['kode_user'];
		$user->nis = $users['nis'];
		$user->fullname = $users['fullname'];
		$user->kelas = $users['kelas'];
		$user->alamat = $users['alamat'];
		$user->update();

		return redirect('/user/{$nama}');
	}
}

?>