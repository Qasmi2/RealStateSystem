<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

class VarificationController extends Controller
{
    public function varify(){
        if(Gate::allows('admin-only',Auth::user())){
            return view('home');
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to register New User .');
        }
    }

    public function addUser(){
        if(Gate::allows('admin-only',Auth::user())){
            return view('adminactions.adduser');
        }
        else{
            return redirect()->back()->with('error',' You are not Allow to register New User .');
        }
    }


}
