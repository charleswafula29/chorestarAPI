<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chores;

class ChoresController extends Controller
{
    public function NewChore(){
        $child=new Chores();
        $child->ChoreName=request('ChoreName');
        $child->ChoreImage=request('ChoreImage');
        $child->ChorePoints=request('ChorePoints');
        $child->Email=request('Email');
        $child->ChildName=request('ChildName');
        $child->save();
    }
    
    public function FetchChores($Email){
        $Chores=Chores::all()->where("Email",$Email);
        return json_encode(['Chores'=>$Chores]);
    }
}
