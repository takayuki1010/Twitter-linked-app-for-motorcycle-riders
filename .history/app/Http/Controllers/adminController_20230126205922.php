<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class adminController extends Controller
{
    // Basic認証関係　今回は使わない
    public function index()
    {
        $users = User::paginate(10);

        return view('userlist', compact('users'));
    }
}
