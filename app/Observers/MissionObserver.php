<?php

namespace App\Observers;

use App\Models\HistoryLog;
use App\Models\Mission;
use Illuminate\Support\Facades\Auth;

class MissionObserver
{
    /**
     * Handle the Mission "created" event.
     */
    public function created(Mission $mission): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'created',
            'model' => Mission::class,
            //   'query' => 'INSERT INTO missions (columns) VALUES (...)', // optional if needed
            'changes' => json_encode($mission->getAttributes(), JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * Handle the Mission "updated" event.
     */
    public function updated(Mission $mission): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'updated',
            'model' => Mission::class,
            // 'query' => 'UPDATE missions SET ... WHERE id = ...', // optional if needed
            'changes' => json_encode($mission->getChanges(), JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * Handle the Mission "deleted" event.
     */
    public function deleted(Mission $mission): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'Deleted',
            'model' => Mission::class,
            // 'query' => 'DELETE missions WHERE id = ...', // optional if needed
            'changes' => json_encode($mission->getChanges(), JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * Handle the Mission "restored" event.
     */
    public function restored(Mission $mission): void
    {
        //
    }

    /**
     * Handle the Mission "force deleted" event.
     */
    public function forceDeleted(Mission $mission): void
    {
        //
    }
}
