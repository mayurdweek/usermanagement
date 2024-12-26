<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Testapi extends Controller
{
    //
    public function list()
    {
        return User::all();
    }
    public function addUser(Request $request) 
    {
        $rules=array(
            "name"=>"required | min:2 | max:10",
            "email"=>"required|email",
            "mobile"=>"required | max:10",
            "gender"=>"required",
            "city"=>"required",
            "country"=>"required",
            "state"=>"required",
            "password"=>"required"
        );
        $validateuser=Validator::make($request->all(),$rules);
        if($validateuser->fails())
        {
            return $validateuser->errors();
        }
        else{
            $user=new User();
            $user->email=$request->email;
            $user->password=$request->password;
            $user->mobile=$request->mobile;
            $user->gender=$request->gender;
            $user->city=$request->city;
            $user->hobby=$request->hobby;
            $user->country=$request->country;
            $user->state=$request->state;
            $user->name=$request->name;
            $user->image=$request->image;
    
            if($user->save())
            {
                return "Student Added";
            }
            else{
                return "Student not added";
            }
        }
       
    }
    public function updateuser(Request $request)
    {
        $user=User::find($request->id);
        $user->email=$request->email;
        $user->password=$request->password;
        $user->mobile=$request->mobile;
        $user->gender=$request->gender;
        $user->city=$request->city;
        $user->hobby=$request->hobby;
        $user->country=$request->country;
        $user->state=$request->state;
        $user->name=$request->name;
        $user->image=$request->image;
        if($user->save())
        {
            return "Student update";
        }
        else{
            return "Student not update";
        }
    }
    public function deleteuser($id)
    {
        $user=User::destroy($id);
        if($user)
        {
            return ["message"=>"user delete success"];
        }
        else{
            return ["message"=>"user not delete success"];
        }
    }
    public function searchuser($name)
    {
        $user=User::where('name','like',"%$name%")->get();
        if($user)
        {
            return ["result"=>$user];
        }
        else{
            return ["result"=>"no record found"];
        }
    }
}
