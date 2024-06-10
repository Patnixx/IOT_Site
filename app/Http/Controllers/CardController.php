<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{ //NOTE - This controller is done
    public function index() {
        if(Auth::check()){
            if (Auth::user()->role == 'Admin') {
                $cardsAll = Card::with(['user'])->get();
                $cardsNull = Card::where('owner_id', null)->get();
                $cards = Card::whereHas('user', function($query) {
                    $query->whereIn('role', ['Teacher', 'Student']);
                })
                ->with(['user'])
                ->get();
                $cards_card = Card::where('type', 'Card')->count();
                $cards_chip = Card::where('type', 'Chip')->count();
                return view('cards.indexca', compact('cardsAll', 'cards_card', 'cards_chip'));
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
                $users = User::whereNull('rfid')->whereIn('role', ['Teacher', 'Student'])->get();
                $users_count = User::whereNull('rfid')->count();
                return view('cards.createca', compact('users', 'users_count'));
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
                    'status'=> ['required'],
                ]);
        
                $user_id = User::where('name', $request->owner)->get('id');

                Card::create([
                    'rfid' => $request->rfid,
                    'owner_id' => $user_id[0]->id,
                    'type' => $request->status,
                ]);

                User::where('id', $user_id[0]->id)->update([
                    'rfid' => $request->rfid,
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
                //$users = User::where(['rfid', '=', null], ['role', '=', 'teacher'])->get();
                $users = User::whereIn('role', ['Teacher', 'Student'])->get();
                $users_count = User::whereNull('rfid')->count();
                return view('cards.editca', compact('card', 'users', 'users_count'));
                //return $users;
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
                //return $user_id;
        
                Card::where('id', $id)->update([
                    'rfid' => $request->rfid,
                    'owner_id' => $user_id[0]->id,
                ]);

                User::where('rfid', $request->rfid)->update([
                    'rfid' => null,
                ]);

                User::where('id', $user_id[0]->id)->update([
                    'rfid' => $request->rfid,
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
                $card_rfid = Card::where('id', $id)->get('rfid');
                Card::where('id', $id)->delete();
                User::where('rfid', $card_rfid[0]->rfid)->update([
                    'rfid' => null,
                ]);
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
