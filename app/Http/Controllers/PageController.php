<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PokemonCard;
use App\Models\User;

class PageController extends Controller
{
    //
    public function LandingPage()
    {
        return redirect()->route('cert');
    }

    public function CertPage()
    {
        return view('user.search');
    }

    public function Search(Request $request)
    {
        $card = PokemonCard::where('serial', $request->serial)->get();
    
        return $card;
    }

    public function AddPage()
    {
        return view('admin.add');
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
}
