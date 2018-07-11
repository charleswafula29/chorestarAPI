<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chores;
use App\Children;

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
        $Chores=Chores::all()->where("Email",$Email)->where("Status","Pending");
        return json_encode(['Chores'=>$Chores]);
    }
    
    public function FetchAlerts($Email){
        $Chores=Chores::all()->where("Email",$Email)->where("Status","Done");
        return json_encode(['Chores'=>$Chores]);
    }
    public function ChoreDone($Email,$ChildName,$ChoreName){
        $Chores=Chores::all()->where("Email",$Email)->where("ChildName",$ChildName)->where("ChoreName",$ChoreName)->first();
        $Chores->Status="Done";
        $Chores->save();
        return json_encode(['Chores'=>$Chores]);
    }
    
    public function ChoreDecline($Email,$ChildName,$ChoreName){
        $Chores=Chores::all()->where("Email",$Email)->where("ChildName",$ChildName)->where("ChoreName",$ChoreName)->first();
        $Chores->Status="Pending";
        $Chores->save();
        return json_encode(['Chores'=>$Chores]);
    }
    
    public function ChoreAccept($Email,$ChildName,$ChoreName,$ChorePoints){
        $Chores=Chores::all()->where("Email",$Email)->where("ChildName",$ChildName)->where("ChoreName",$ChoreName)->first();
        $Chores->Status="Accepted";
        $Chores->save();
        
        $User=Children::all()->where("Email",$Email)->where("ChildName",$ChildName)->first();
        $User->Points=$ChorePoints;
        $User->save();
    }
 
}
