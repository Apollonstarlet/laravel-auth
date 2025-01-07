<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PokemonCard;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function AddPage()
    {
        return view('admin.add');
    }

    public function CardsPage(Request $request)
    {
	$data = array();
        $data['cards'] = PokemonCard::get();

        return view('admin.cards')->with('data', $data);
    }

    public function Add(Request $request)
    {
        $card = new PokemonCard();
        $card->cardname = $request->cardname;
        if ($request->hasFile('image') && $request->file('image')->isValid()){
                $file = $request->file('image');
                $filename = date("Y-m-d-h-m").'-'.$request->serial.'.'. str_replace('jpg', 'jpg', $request->file('image')->guessExtension());
                
                $file->move("assets/img/cards/",$filename);
                $card->img = 'assets/img/cards/'. $filename;
            }
        $card->serial= $request->serial;
        $card->yea= $request->yea;
        $card->lan= $request->lan;
        $card->variant= $request->variant;
        $card->front= $request->front;
        $card->sidecorners= $request->sidecorners;
        $card->back= $request->back;
        $card->centring= $request->centring;
        $card->overall= $request->overall;
        $card->save();

        return redirect()->back()->with(session()->flash('success', 'Add Card successful'));
    }

    public function Users()
    {
        $data = array();
        $data['users'] = User::where('role', 'user')->paginate(10);
        return view('admin.users')->with('data', $data);
    }

    public function Setting()
    {
        $data = array();
        return view('pages.setting')->with('data', $data);
    }

    public function Security()
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

    public function CardDel(Request $request)
    {
        $card = PokemonCard::where('id', $request->id)->first();
        $card->delete();
        return redirect()->back();
    }

    public function CardEdit(Request $request)
    {
        $data = array();
        $data['card'] = PokemonCard::where('id', $request->id)->first();
        return view('admin.cardedit')->with('data', $data);
    }

    public function CardUpdate(Request $request)
    {
        $card = PokemonCard::where('id', $request->id)->first();
        $card->cardname = $request->cardname;
        if ($request->hasFile('image') && $request->file('image')->isValid()){
                $file = $request->file('image');
                $filename = date("Y-m-d-h-m").'-'.$request->serial.'.'. str_replace('jpg', 'jpg', $request->file('image')->guessExtension());
                
                $file->move("assets/img/cards/",$filename);
                $card->img = 'assets/img/cards/'. $filename;
            }
        $card->serial= $request->serial;
        $card->yea= $request->yea;
        $card->lan= $request->lan;
        $card->variant= $request->variant;
        $card->front= $request->front;
        $card->sidecorners= $request->sidecorners;
        $card->back= $request->back;
        $card->centring= $request->centring;
        $card->overall= $request->overall;
        $card->save();
        
        return redirect()->route('cards');
    }
}