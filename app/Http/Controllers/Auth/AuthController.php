<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerRequest;
use App\Http\Requests\vvalidateLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function __contruct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        
    }
    public function showregister(){
        return view('articles.inscription');
    }
    public function showlogin(){
        return view('articles.connexion');
    }
    public function validateRegister( user $user ,registerRequest $request){
        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect()->route('index')->with('status','inscription reussie !');

    
        

    }
    public function validateLogin(vvalidateLoginRequest $request){
        $credentials = $request->only(['email','password']);
        if(Auth::attempt($credentials,(bool) $request->remember)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
    
        }else{
            return redirect()->back()->with('message_error',"Ce compte est introvable(email ou mot de pass incorrect)");
        }

        

    }
    public function logout(){
    
        Auth::logout();
        return redirect()->route('login');
    }
}
