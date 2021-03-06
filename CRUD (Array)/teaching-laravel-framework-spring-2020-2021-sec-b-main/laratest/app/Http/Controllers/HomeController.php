<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Command\DumpCommand;

class HomeController extends Controller
{
    public function index( Request $req){

        $name = "alamin";
        $id = "123";

        //return view('home.index', ['name'=> 'xyz', 'id'=>12]);

        // return view('home.index')
        //         ->with('name', 'alamin')
        //         ->with('id', '12');

        // return view('home.index')
        //         ->withName($name)
        //         ->withId($id);

        /* if($req->session()->has('username')){ */
            return view('home.index', compact('id', 'name'));
       /*  }else{
            $req->session()->flash('msg', 'invalid request...login first!');
            return redirect('/login');
        } */

    }

    public function create(){
        return view('home.create');
    }

    public function store(Request $req){

        //insert into DB or model...
        //echo $req->username;

        $alluser = $this->getUserlist();
        array_push($alluser,['id'=> '4', 'name'=> $req->username,'email'=>$req->email, 'password'=>$req->password]);

        return view('home.list')->with('list',$alluser);
        
       // return redirect('/home/userlist');

    }

    public function edit($id){
        $userlist= $this->getUserlist();
        $user = [];

        foreach($userlist as $u){
            if($u['id'] == $id ){
                $user = $u;
                break;
            }
        }

        //$user =  ['id'=>2, 'username'=>'abc', 'email'=> 'abc@aiub.edu', 'password'=>'456'];
        return view('home.edit')->with('user', $user);
    }


    public function update($id, Request $req){

        //$user = ['id'=> $id, 'name'=> $req->name,'email'=>$req->email, 'password'=>$req->password];
        //updating DB or model
        $alluser = $this->getUserlist();
        $value = array();
        foreach($alluser as $u){
            if($u['id'] != $id ){
                array_push($value,$u);
            }
        }
        array_push($value,['id'=> $id, 'name'=> $req->username,'email'=>$req->email, 'password'=>$req->password]);
        return view('home.list')->with('list',$value);
    }

    public function userlist(){
        // db model userlist
        $userlist = $this->getUserlist();

        return view('home.list')->with('list', $userlist);
    }

    public function delete($id){
        $alluser = $this->getUserlist();
        
        $value = array();
        foreach($alluser as $u){
            if($u['id'] != $id ){
                array_push($value,$u);
            }
        }
        
        return view('home.list')->with('list',$value);
    }


    public function getUserlist (){

        return [
                ['id'=>1, 'name'=>'alamin', 'email'=> 'alamin@aiub.edu', 'password'=>'123'],
                ['id'=>2, 'name'=>'abc', 'email'=> 'abc@aiub.edu', 'password'=>'456'],
                ['id'=>3, 'name'=>'xyz', 'email'=> 'xyz@aiub.edu', 'password'=>'789']
            ];
    }
}
