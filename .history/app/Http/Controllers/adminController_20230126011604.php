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

        $message = $users->messuser;

        foreach($message as $a){
            dd($a);
        }


        return view('userlist', compact('users'));
    }
}
