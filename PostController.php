<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tpost;

class PostController extends Controller
{
   public function createUserPost(Request $request){

   		$this->validate($request,[
   			'post'=>'required'
   			]);
   		$tpost =new Tpost();
   		$tpost->body =$request['post'];
   		$message = "something wrong";


   		if($request->tuser()->tposts()->save($tpost))
   		{
   			$message = "post Successfully Submited";
   		}
   		return redirect()->route('dashboard')->with('message',$message);
   }
}
