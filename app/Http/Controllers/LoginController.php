<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        try {
            if (View::exists('Home.login')) {
                    return view('Home.login');
            } else {
                throw new \Exception('Page not found...!');
            }
        } catch (\Throwable $e) {
            return view('Error.404')->with(['msg'=>$e->getMessage()]);
        }
    }
    public function authentication(Request $request){
        try{
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                if (View::exists('Admin.home')) {
                    return view('Admin.home');
                } else {
                    throw new \Exception('Page not found...!');
                }
            }else{
                throw new \Exception('Username or password is incorrect...!');
            }
        }
        catch(\Throwable $e){
            return view('Home.login')->with(['notify'=>$e->getMessage()]);
        }
    }
    public function register(){
        try{
            if (View::exists('Home.register')) {
                return view('Home.register');
            } else {
                throw new \Exception('Page not found...!');
            }
        } catch (\Throwable $e) {
            return view('Error.404')->with(['msg'=>$e->getMessage()]);
        }
    }
    public function registration(Request $request){
        try{
            $input = $request->except('_token');
            $input['password'] = Hash::make($request['password']);
            $this->status = User::create($input);
            if($this->status){
                $key = 200;
                throw new \Exception('Registration Success...!');
            }else{
                throw new \Exception('Registration Failed...!');
            }
        }catch(\Throwable $e){
            return view('Home.register')->with(['msg'=>$e->getMessage()]);
        }
    }
}
