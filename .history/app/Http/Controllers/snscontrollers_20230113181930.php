<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class snscontrollers extends Controller
{
    // public function __construct() {

    // }

    public function index() {
        return view('index');
    }
}
