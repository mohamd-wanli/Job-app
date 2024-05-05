<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
   public function create(){
    return view('users.register');
   }

   public function store(Request $request){
      $fields=$request->validate([
        'name'=>['required','min:3'],
        'email'=>['required','email','unique:users,email'],
        'password'=>'required|confirmed|min:3'
      ]);
       $fields['password']=bcrypt( $fields['password']);
     $user= User::create($fields);
      auth()->login($user);
      return redirect('/')->with('message','regstiration completed successfully');

   }
   public function logout(Request $request){
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/')->with('message','you have been logged out');
      
   }
   public function createlog(){
      return view('users.login');
   }
   public function authenticate(Request $request){
      $fields=$request->validate([
         'email'=>['required','email'],
         'password'=>'required'
       ]);
       if(auth()->attempt($fields)){
         $request->session()->regenerate();
         return redirect('/')->with('message','you are logged in');
       }
       return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');
   }

}
