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
}
