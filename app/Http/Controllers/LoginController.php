<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // public function auth(Request $request)
    // {
    //     foreach (login::all() as $login) {
    //         echo $login->name;
    //     }
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);

    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect()->intended('/dashboard');
    //     }

    //     return back()->with('loginError', 'LoginFailed!');
    // }

    public function takeAll(Request $request)
    {
        $value = $request->session()->get('dimas');
        $username = $_POST['username'];
        $password = $_POST['password'];

        $validate = login::where('username', $username)
                        ->where('password', $password)
                        ->first();
                        
                        
        if (!empty($validate->username)) { 
            if ($validate->level == 'admin') {
                $request->session()->put('dimas', $validate->username);  
                // $request->session()->regenerate();   
                return view('admin/adminPage', [
                    'data' => $validate]);
            } elseif ($validate->level == 'tamu') {
                $request->session()->put('dimas', $validate->username);  
                $request->session()->regenerate();
                return view('user/userPage', [
                    'data' => $validate]);
            } elseif ($validate->level == 'resepsionis') {
                $request->session()->put('dimas', $validate->username);  
                $request->session()->regenerate();
                return view('resepsionis/resepsionisPage', [
                    'data' => $validate]);
            }
            
            // return view('userPage', [
            //     'data' => $validate]);
            
        } else {
            return back()->with('loginError', 'LoginFailed!');
        }            
                    
    }

    public function getLogout(Request $request)
    {
        $request->session()->invalidate();
		return redirect('/login');
        
    }

}
