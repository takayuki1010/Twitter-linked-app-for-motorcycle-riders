<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index()
    {
        $user = User::all();

        return view('userlist', compact('user'));
    }
}
