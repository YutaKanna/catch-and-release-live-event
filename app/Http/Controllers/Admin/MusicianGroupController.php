<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\MusicianGroup;
use App\Mail\InviteMusician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Mail;

class MusicianGroupController extends Controller
{
    public function index()
    {
        $musicianGroups = MusicianGroup::all();
        return view('admin.musician_groups.index', ['musicianGroups' => $musicianGroups]);
    }

    public function show(MusicianGroup $musicianGroup)
    {
        return view('admin.musician_groups.show', ['musicianGroup' => $musicianGroup]);
    }

    public function store(MusicianGroup $musicianGroup, Request $request)
    {
        // emailはユニークなので、ここでそのemailがすでにミュージシャンテーブルにあって、かつ中間テーブルを見て、ミュージシャンがそのグループに属していたら弾くようにする
        $email = $request->input('email');
        $url = URL::temporarySignedRoute('musicians.register', now()->addDays(1), ['musicianGroup' => $musicianGroup]);
        $subject = $musicianGroup->name .'に招待されました';
        $message = $musicianGroup->name . '様から招待依頼が届きました。';
        Mail::to($email)->send(new InviteMusician($subject, $message, $url));

        return redirect()->route('admin.musician_groups.show', ['musicianGroup' => $musicianGroup])->with('success_message', '招待メールを送信しました');
    }

    // todo: registerとprocessはMusicianController作って、そこに移す
    public function register(MusicianGroup $musicianGroup)
    {
        // todo: ミュージシャンテーブルにemailがあれば、ログイン画面に。なければ登録画面に
        return view('musicians.auth.register', compact('musicianGroup'));
    }

    public function process(Request $request, MusicianGroup $musicianGroup)
    {
        $rules = [
            'name' => ['required', 'max:191'],
            'email' => ['required', 'max:191', 'unique:users'],
            'password' => ['required', 'max:191'],
        ];

        $this->validate($request, $rules);

        // usersテーブルにmusicianを登録
        $musician = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => 10,
        ]);

        // そのあと、musicianを招待したグループに所属させる
        $musician->musicianGroups()->attach($musicianGroup->id);

        return redirect()->route('admin.musician_groups.show', ['musicianGroup' => $musicianGroup])->with('success_message', '招待されました');
    }
}
