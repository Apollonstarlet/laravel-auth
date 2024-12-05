<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function Users(Request $request)
    {
        $data = array();
        $data['users'] = User::where('role', 'user')->paginate(10);
        return view('admin.users')->with('data', $data);
    }

    public function Setting(Request $request)
    {
        $data = array();
        return view('pages.setting')->with('data', $data);
    }

    public function Security(Request $request)
    {
        return view('pages.security');
    }
    
    public function Profile(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        if(isset($request->email))
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;

        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');
            $filename = date("Y-m-d-h-m").'-'.$user->firstname.'.'. str_replace('jpg', 'jpg', $request->file('image')->guessExtension());
            
            $file->move("assets/img/user/",$filename);
            $user->img = 'assets/img/user/'. $filename;
        }

        $user->save();
        return redirect()->back()->with(session()->flash('success', 'Profile change successful'));
    }
    
    public function SetPassword(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if($request->newpwd == $request->repwd){
            if(Hash::check($request->get('oldpwd'), Auth::user()->password)){
                $user->password = Hash::make($request->newpwd);
                $user->save();
                return redirect()->back()->with(session()->flash('success', 'Password change successful'));
            } else{
                return redirect()->back()->with(session()->flash('error', 'Your current password is incorrect'));
            }
        } else{
            return redirect()->back()->with(session()->flash('error', 'Your new password is incorrect'));
        }
    }
    
    public function UserDel(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->status = "Inactive";
        $user->save();
        return redirect()->back();
    }
}
