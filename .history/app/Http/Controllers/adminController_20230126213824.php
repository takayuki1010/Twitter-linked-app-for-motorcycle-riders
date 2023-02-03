<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class adminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('userlist', compact('users'));
    }
}
