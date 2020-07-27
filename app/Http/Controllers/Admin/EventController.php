<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Event;
use App\Venue;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventStoreRequest;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', ['events' => $events]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(EventStoreRequest $request)
    {
        // $hoge = 'hoge';
        // dd($request->category);
        $event = new Event;
        $event->name = $request->name;
        $event->description = $request->description;
        // グループ単位で登録できるようにしたい。リレーションも多対多に変更
        $event->user_id = 1;
        $event->date = $request->date;
        $event->open = $request->open;
        $event->start = $request->start;
        $event->close = $request->close;
        $event->category_id = $request->category;

        $venue = new Venue;
        $venue->name = $request->venue;
        $venue->save();
        $event->venue_id = $venue->id;
        $event->save();

        return redirect()->route('admin.events.index')->with('success_message', ('登録完了しました'));
    }
}
