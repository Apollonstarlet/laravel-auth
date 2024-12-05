<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PageController extends Controller
{
    //
    public function LandingPage()
    {
        return redirect()->route('login');
    }

    public function Signup(Request $request)
    {
        $user = new User();
        $user->firstname = $request->firstname; 
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user';
        $user->img = 'assets/img/avatars/1.png';
        $user->save();
        
        return redirect()->route('login')->with('sucess','Registration Sucessful!');
        
    }
}
