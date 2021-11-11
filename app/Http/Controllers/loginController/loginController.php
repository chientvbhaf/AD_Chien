<?php

namespace App\Http\Controllers\loginController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class loginController extends Controller
{
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function form_login(){
        return view('login.login');
    }
    public function login_check(Request $request){
        if(Auth::attempt(['account_name' => $request->account_name, 'password'=> $request->pass])){
            if($request->text == "loginadmin"){
                return redirect()->route('admin.index');
            }else{
                return redirect()->route('home.index');
            }
        }else{
            return redirect()->back();
        }
    }
    public function form_register(){
        return view('login.register');
    }
    public function register_store(Request $request){
        if($request->pass == $request->pass2){
            $arr = array(
                'name' => $request->name,
                'email' => $request->gmail,
                'account_name' => $request->account_name,
                'password' => Hash::make($request->pass)
            );
            $user_new = $this->user->create($arr);
            Auth::login($user_new);
        }else{
            return redirect()->back()->with('message','mat khau khong khop');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home.index');
    }
}
