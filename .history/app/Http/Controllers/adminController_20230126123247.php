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

        $messagecount = $users::withCount('messuser')->count();
        dd($messagecount);

        return view('userlist', compact('users', 'messagecount'));
    }
}
