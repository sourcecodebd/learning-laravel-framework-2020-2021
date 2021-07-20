<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function verify(Request $req){

        $user = User::where('password', $req->password) //Select Query
        ->where('username', $req->username)
        ->get();

        if($req->username == "" || $req->password == ""){
           $req->session()->flash('msg', 'Null username or password...');
           return redirect('/login');
        }

        elseif($req->username == "Nafi" && $req->password == "1999"){

            $req->session()->put('username', $req->username);
            $req->session()->put('type', 'Admin');
            return redirect('/home');
        }

        elseif(count($user)>0){
            //$req->session()->put('password', $req->password);
            //$req->session()->get('name');
            //$req->session()->forget('name');
            //$req->session()->flush();
            //$req->session()->has('name');

            /* $req->session()->flash('msg', 'Invalid user info...');
            $req->session()->flash('error', 'Bad request error...');
            $req->session()->get('msg');
            $req->session()->keep('msg');
            $req->session()->get('msg'); */
            //$req->session()->reflash();
            //$req->session()->pull('name');

            $req->session()->put('username', $req->username);
            $req->session()->put('type','User');
            return redirect('/home');
        }
        
        else{

            $req->session()->flash('msg', 'Invalid username or password...');
            return redirect('/login');
        }
    }
}
