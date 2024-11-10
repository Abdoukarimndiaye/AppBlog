<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class dashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        return view('dashboard.index');
    }
    public function passwordModify(Request $request):RedirectResponse{
        $user = Auth::user();
        $validated = $request->validate([
            'current_password'=>['required','min:8',
            function (string $attribute, mixed $value, Closure $fail)use($user) {
               if(! Hash::check($value,$user->password)){
                    $fail("le {{$attribute}} est incorrecte.");
                
            }
        },
            ],
            'password'=>['required','min:8','confirmed'],

        ]);
        
$user->update([
    'password'=>$validated['password'],

]);
   return redirect()->route('dashboard')->with('status','vôtre mot de pass a été modifié ayvec success');
    }
}
