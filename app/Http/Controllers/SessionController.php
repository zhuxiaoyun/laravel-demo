<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createAction()
    {
        return view('sessions.create');
    }
}
