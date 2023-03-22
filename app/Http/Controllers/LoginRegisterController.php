<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller
{
    use AuthenticatesUsers;



    public function login() {
        if(Auth::check()){
            $userType = auth()->user()->type;
            if ($userType == 'developer') 
            {
                return redirect()->route('admin.home');
            }

            elseif($userType == 'other') 
            {
                return redirect()->route('manager.home');
            }

            elseif($userType == 'hr')
            {
                return redirect()->route('dashboard');
            }
        }
        else{
            return view("signIn");
        }
       
       
    }


    public function loginUser(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request ,[
            'email' => 'required|email',
            'password' => 'required',
        ]);


    $credentials = $request->only('email', 'password');
     if (Auth::attempt($credentials)) {
           
        $userType = auth()->user()->type;
            if ($userType == 'developer') 
            {
                return redirect()->route('admin.home');
            }

            elseif($userType == 'other') 
            {
                return redirect()->route('manager.home');
            }

            elseif($userType == 'hr')
            {
                return redirect()->route('dashboard');
            }

            
        }
          
    }

    public function logoutUser()
    {
        Session::flush();
        
        Auth::logout();
        return redirect('/');
    }
}