<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class forgotpasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('Articles.forgotpassword');
    }
    public function submitForgetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

            DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Réinitialiser de mot de passe');
        });

        return back()->with('status', 'Nous avons envoyé par e-mail le lien de réinitialisation de votre mot de passe ! ');
    }
   public function showResetPasswordForm($token){
    
    return view('Articles.showResetPasswordForm',['token'=>$token]);

   }
   public function submitResetPasswordForm(Request $request): RedirectResponse
   {  
       $request->validate([
           'email' => 'required|email|exists:users',
           'password' => 'required|string|min:6|confirmed',
           'password_confirmation' => 'required'
       ]);

       $updatePassword = DB::table('password_reset_tokens')
                           ->where([
                             'email' => $request->email, 
                             'token' => $request->token,
                           ])
                           ->first();

       if(!$updatePassword){
           return back()->withInput()->with('message_error', 'le jeton est invalide!');
       }

       $user = User::where('email', $request->email)
                   ->update(['password' => Hash::make($request->password)]);

       DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

       return redirect()->route('login')->with('status', 'vôtre mot de pass a éte changé');
   }
}	

