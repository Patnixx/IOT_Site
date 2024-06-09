<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{ //NOTE - This controller is done
    public function index() {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $cards = Card::whereHas('user', function($query) {
                    $query->whereIn('role', ['Teacher', 'Student']);
                })
                ->with(['user'])
                ->get();
                $cards_card = Card::whereHas('user', function($query) {
                    $query->whereIn('role', ['Teacher']);
                })
                ->with(['user'])
                ->count();
                $cards_chip = Card::whereHas('user', function($query) {
                    $query->whereIn('role', ['Student']);
                })
                ->with(['user'])
                ->count();
                return view('cards.indexca', compact('cards', 'cards_card', 'cards_chip'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function create()
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                return view('cards.createca');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $request->validate([
                    'rfid' => ['required'],
                    'owner'=> ['required'],
                ]);
        
                $user_id = User::where('name', $request->owner)->get('id');
        
                Card::create([
                    'rfid' => $request->rfid,
                    'owner_id' => $user_id[0]->id,
                ]);
        
                Session::flash('success-message', 'Class created successfully!');
                return redirect()->route('cardsIndex');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function edit($id)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $card = Card::find($id);
                return view('cards.editca', compact('card'));
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function update(Request $request, $id)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $request->validate([
                    'rfid' => ['required'],
                    'owner'=> ['required'],
                ]);
        
                $user_id = User::where('name', $request->owner)->get('id');
        
                Card::where('id', $id)->update([
                    'rfid' => $request->rfid,
                    'owner_id' => $user_id[0]->id,
                ]);
        
                Session::flash('success-message', 'Class updated successfully!');
                return redirect()->route('cardsIndex');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }

    public function delete($id)
    {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                Card::where('id', $id)->delete();
                Session::flash('success-message', 'Class deleted successfully!');
                return redirect()->route('cardsIndex');
            }
            else {
                return view('errors.403');
            }
        }
        else {
            return view('errors.403');
        }
    }
}
