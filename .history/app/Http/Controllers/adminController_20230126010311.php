<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    //
    public function index()
    {
        $user = User::all();

        return view('userlist', compact('user'));
    }
}
