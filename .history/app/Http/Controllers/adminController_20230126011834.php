<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class adminController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        $message = User::find(1)->usertable;

        foreach($message as $a){
            dd($a->name);
        }


        return view('userlist', compact('users'));
    }
}
