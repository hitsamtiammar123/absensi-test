<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Model\User;

class AuthController extends Controller
{
    //

    protected $default_redirect = '';

    public function __construct(){
        $this->default_redirect = route('index');
    }


    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        //$user = User::where('email',$email)->where('password',\bcrypt($password))->first();
        if(Auth::attempt(['email' => $email, 'password' => $password],true)){
            //Auth::login($user,true);
            return redirect($this->default_redirect);
        }
        return redirect($this->default_redirect)->withErrors([
            'message' => 'Gagal untuk login, email atau password salah, silahkan coba sekali lagi'
        ]);
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect($this->default_redirect);
    }
}
