<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parents;

class ParentsController extends Controller
{
    public function RegisterParent(){
        $Parent= new Parents();
        $Parent->Email="TestEmail";
        $Parent->Password="Test Pass";
        $Parent->Nickname="TestNicky";
        $Parent->Childname="Childname";
        $Parent->ChildImage="RuthLove";
        $Parent->save();
    }
}
