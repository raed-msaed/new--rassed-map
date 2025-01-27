<?php

namespace App\Observers;

use App\Models\HistoryLog;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;

class PointObserver
{
    /**
     * Handle the Point "created" event.
     */
    public function created(Point $point): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'created',
            'model' => Point::class,
            //  'query' => 'INSERT INTO suivmissions (columns) VALUES (...)', // optional if needed
            'changes' => json_encode($point->getAttributes(), JSON_UNESCAPED_UNICODE),

        ]);
    }

    /**
     * Handle the Point "updated" event.
     */
    public function updated(Point $point): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'updated',
            'model' => Point::class,
            //  'query' => 'INSERT INTO suivmissions (columns) VALUES (...)', // optional if needed
            'changes' => json_encode($point->getAttributes(), JSON_UNESCAPED_UNICODE),

        ]);
    }

    /**
     * Handle the Point "deleted" event.
     */
    public function deleted(Point $point): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'deleted',
            'model' => Point::class,
            //  'query' => 'INSERT INTO suivmissions (columns) VALUES (...)', // optional if needed
            'changes' => json_encode($point->getAttributes(), JSON_UNESCAPED_UNICODE),

        ]);
    }

    /**
     * Handle the Point "restored" event.
     */
    public function restored(Point $point): void
    {
        //
    }

    /**
     * Handle the Point "force deleted" event.
     */
    public function forceDeleted(Point $point): void
    {
        //
    }
}
