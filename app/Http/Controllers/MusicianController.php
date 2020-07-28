<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Enums\UserType;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    public function index()
    {
        $musicians = User::where('type', UserType::Musician)->get();
        return view('musicians.index', ['musicians' => $musicians]);
    }

    public function show(User $musician)
    {
        $events = Event::all();
        return view('musicians.show', compact('musician', 'events'));
    }
}
