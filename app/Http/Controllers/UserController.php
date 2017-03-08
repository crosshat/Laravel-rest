<?php
/**
 * Created by PhpStorm.
 * User: crosshat
 * Date: 3/3/2017
 * Time: 10:19 PM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDashboard(){
        return view('dashboard');
    }
 public function postSignUp(Request $request){
     $this->validate($request,['email'=>'email|unique:users',
         'firstname'=>'required|max:120','password'=>'required|min:4']
         );
     $email=$request['email'];
     $firstname=$request['firstname'];
     $password=bcrypt($request['password']);

     $user=new User();
     $user->email=$email;
     $user->firstname=$firstname;
     $user->password=$password;
     $user->save();
     Auth::login($user);
     return redirect()->route('dashboard');
 }
 public function postSignIn(Request $request){
    if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
        return redirect()->route('dashboard');
    }
    return redirect()->back();
 }
}