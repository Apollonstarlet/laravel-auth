<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Quotes(Request $request)
    {
        return view('user.quotes');
    }
}
