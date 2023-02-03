<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class adminController extends Controller
{
    public function index()
    {
        if(Auth::user()->role === '10101')
        {
            $users = User::paginate(10);

            return view('userlist', compact('users'));
        }

        return redirect()->route('list.index');

    }
}
