<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\MusicianGroup;
use App\Venue;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventStoreRequest;

class EventController extends Controller
{
    public function index()
    {
        // $events = Event::all();
        $events = Event::where('public_date', '<=', now())->get();
        return view('admin.events.index', ['events' => $events]);
    }

    public function show(Event $event)
    {
        return view('admin.events.show', ['event' => $event]);
    }

    public function create()
    {
        $categories = Category::all();
        $musicianGroups = MusicianGroup::all();
        return view('admin.events.create', compact('categories', 'musicianGroups'));
    }

    public function store(EventStoreRequest $request)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->public_date = $request->public_date;
        // グループ単位で登録できるようにしたい。リレーションも多対多に変更
        $event->user_id = 1;
        $event->date = $request->date;
        $event->open = $request->open;
        $event->start = $request->start;
        $event->close = $request->close;
        $event->category_id = $request->category;

        if ($request->image){
            $file_name = $request->file('image')->store('public/images');
            $event->file_name = basename($file_name);
        }

        if ($request->file){
            $pdf_name = $request->file('file')->store('public/images');
            $event->pdf = basename($pdf_name);
        }
        $event->pre_price = $request->pre_price;
        $event->basic_price = $request->basic_price;

        $venue = new Venue;
        $venue->name = $request->venue;
        $venue->save();
        $event->venue_id = $venue->id;
        $event->save();

        // 中間テーブルにoffer、タレントのidを保存できるようにする
        // 選択されたタレントの数だけループさせる
        foreach ($request->musician_groups as $musicianGroupId) {
            $event->musicianGroups()->attach($musicianGroupId);
        }

        return redirect()->route('admin.events.index')->with('success_message', ('登録完了しました'));
    }
}
