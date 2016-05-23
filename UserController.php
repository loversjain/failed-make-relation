<?php

namespace App\Http\Controllers;
use App\Tuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function getDashboard(){
		return view('dashboard');
	}
    
    public function signuserUp(Request $request){
    $this->validate($request,[
    'email'=>'required|email|unique:tusers',
    'upname'=>'required',
    'up-password'=>'required|min:3'
    ]);

    	 $email = $request['email'];
        $name =$request['upname'];	
        $password = bcrypt($request['up-password']);

        $tuser = new Tuser;
        $tuser->email =$email;
        $tuser->name= $name;
        $tuser->password =$password;
        $tuser->save();
        return redirect()->route('dashboard');
    }
    public function signInUser(Request $request){
        $this->validate($request,[
                'semail'=>'required|email',
                'spassword'=>'required'
            ]);

       if(Auth::attempt(['email' => $request['semail'],'password' => $request['spassword']])){
        return redirect()->route('dashboard');

    }       
    return redirect()->back();
        
    }
}
