<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        $users = User::get();
        $data['users']=$users;
        return view('ecomProject.users', $data);
    }
    function create(){
        return view("ecomProject.addUser");
    }
    function store(Request $request){
        $faker=\Faker\factory::create();
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$faker->password;
        $user->save(); // Row updated in Database table
        return redirect()->route('users.index');
    }
    function edit($id){
        $users=User::where("id","=",$id)->first();
        $data['users']=$users;
        return view("ecomProject.editUser",$data);
    }
    function update(Request $request, $id){
        $user=User::where("id","=",$id)->first();
        $faker=\Faker\factory::create();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$faker->password;
        $user->save(); // Row updated in Database table
        return redirect()->route('users.index');
    }
    function delete($id){
        $user=User::where("id","=",$id)->first();
        $user->delete();
        return back();
    }
}
