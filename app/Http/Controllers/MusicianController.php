<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    public function index()
    {
        // Todo: enum使ってmusicianを表示するようにする
        $musicians = User::where('type', 10)->get();
        return view('musicians.index', ['musicians' => $musicians]);
    }

    public function show(User $musician)
    {
        $events = Event::all();
        return view('musicians.show', compact('musician', 'events'));
    }
}
