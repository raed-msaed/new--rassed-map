<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ModelChanged;
use App\Models\HistoryLog;

class LogModelChanges
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ModelChanged $event)
    {
        HistoryLog::create([
            'user_id' => $event->userId,
            'user_name' => $event->userName,
            'action' => $event->action,
            'model' => $event->model,
            'changes' => $event->changes,
        ]);
    }
}