<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function Home(Request $request)
    {
        return view('user.user-home');
    }

    public function Setting(Request $request)
    {
        return view('pages.setting');
    }

    public function Security(Request $request)
    {
        return view('pages.security');
    }
}
