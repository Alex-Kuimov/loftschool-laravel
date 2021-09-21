<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessfulController extends Controller
{
    public function successful()
    {
        return view('successful');
    }
}
