<?php

namespace App\Http\Controllers;

class RecoveryController extends Controller
{
    //
    public function create()
    {
        return view('auth.recover');
    }
}
