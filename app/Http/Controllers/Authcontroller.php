<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    //
    function login(Request $request)
    {
        $user=User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return ['result'=>"user not found or password different","Success"=>false];
        }
        $success['token']=$user->createToken('Myapp')->plainTextToken;
        $user['name']=$user->name;
        return ['success'=>true,'result'=> $success,"msg"=>"user Login successfully"];
    }
    function Signup(Request $request)
    {
        $input=$request->all();
        $input["password"]=bcrypt($input["password"]);
        $user=User::create($input);
        $success['token']=$user->createToken('Myapp')->plainTextToken;
        $user['name']=$user->name;
        return ['success'=>true,'result'=> $success,"msg"=>"user Register successfully"];
    }
}
