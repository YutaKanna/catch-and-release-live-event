<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('musicians.show', ['musician' => $musician]);
    }
}
