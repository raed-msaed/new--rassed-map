<?php

namespace App\Observers;

use App\Models\HistoryLog;
use App\Models\Suivmission;
use Illuminate\Support\Facades\Auth;

class SuivmissionObserver
{
    /**
     * Handle the Suivmission "created" event.
     */
    public function created(Suivmission $suivmission): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'created',
            'model' => Suivmission::class,
            //  'query' => 'INSERT INTO suivmissions (columns) VALUES (...)', // optional if needed
            'changes' => json_encode($suivmission->getAttributes(), JSON_UNESCAPED_UNICODE),

        ]);
    }

    /**
     * Handle the Suivmission "updated" event.
     */
    public function updated(Suivmission $suivmission): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'updated',
            'model' => Suivmission::class,
            //    'query' => 'UPDATE suivmissions SET ... WHERE id = ...', // optional if needed
            'changes' => json_encode($suivmission->getChanges(), JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * Handle the Suivmission "deleted" event.
     */
    public function deleted(Suivmission $suivmission): void
    {
        HistoryLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name ?? 'Guest',
            'action' => 'deleted',
            'model' => Suivmission::class,
            //  'query' => 'DELETE suivmissions WHERE id = ...', // optional if needed
            'changes' => json_encode($suivmission->getChanges(), JSON_UNESCAPED_UNICODE),
        ]);
    }

    /**
     * Handle the Suivmission "restored" event.
     */
    public function restored(Suivmission $suivmission): void
    {
        //
    }

    /**
     * Handle the Suivmission "force deleted" event.
     */
    public function forceDeleted(Suivmission $suivmission): void
    {
        //
    }
}