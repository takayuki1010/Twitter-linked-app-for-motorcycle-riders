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

        $message = Message::all()->usertable->count();

        dd($message);

        return view('userlist', compact('users'));
    }
}