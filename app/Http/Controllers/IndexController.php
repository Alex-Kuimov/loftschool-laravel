<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $request->user();
        return view('index');

    }

    public function registration()
    {
        return view('registration');
    }
}
