<?php

namespace App\Observers;

use App\Event;

class EventObserver
{
    public function saved(Event $event)
    {
        \Log::debug("event created");
    }
}