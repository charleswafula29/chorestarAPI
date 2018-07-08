<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;

class ParentsController extends Controller
{
    public function RegisterParent(){
        $Parent= new Parents();
        $Parent->Email=request('Email');
        $Parent->Password=request('Password');
        $Parent->Nickname=request('Nickname');
        $Parent->save();
    }
    public function Login($Email,$Pass){
        $User=Parents::all()->where("Email",$Email)->where("Password",$Pass);
        foreach($User as $Fetched){
        $Results[0]=$Fetched->Email;
        $Results[1]=$Fetched->Password;
        $Results[2]=$Fetched->Nickname;
        $Results[3]=$Fetched->id;
        if($Results == null){
            return "Empty";
        }else{
        return json_encode(['User'=>$Results]);   
        }
        }
    }
}
