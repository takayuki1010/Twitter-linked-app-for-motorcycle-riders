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
        $users = User::paginate(10);

        $userrrr = User::withCount('messuser')->get();
        dd($userrrr);
        return view('userlist', compact('users'));
    }
}
