<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function login(Request $request){
		if($request->isMethod('post')){
			$data = $request->all();
		$credential = array(['email'=>$data['username'],'password'=>$data['password']]);
			if(Auth::guard('admin')->attempt(['email'=>$data['username'],'password'=>$data['password']])){
            return redirect('/admin/dashboard');
			}else{
				echo"Some things wrong";
			}
			
			/* echo"<pre>";
			print_r($data);
			die; */
		}
		return view('admin.login');
	}
	public function dashboard(){
		echo"dashboard";
	}
	
}
