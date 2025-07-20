<?php

namespace App\Observers;

use App\Models\Issue;
use App\Models\IssueStatusLog;

class IssueObserver
{
    /**
     * Handle the Issue "created" event.
     */
    public function created(Issue $issue): void
    {
        //
    }

    /**
     * Handle the Issue "updated" event.
     */
    public function updated(Issue $issue): void
    {
        //
        // Check if status is changing
        if ($issue->isDirty('status')) {
            $originalStatus = $issue->getOriginal('status');
            $newStatus = $issue->status;

            IssueStatusLog::create([
                'issue_id' => $issue->id,
                'status'   => $newStatus,
                'additional_data' => [
                    'changed_from' => $originalStatus,
                    'changed_by' => auth()->id(), // assuming user is logged in
                ],
            ]);
        }
    }

    /**
     * Handle the Issue "deleted" event.
     */
    public function deleted(Issue $issue): void
    {
        //
    }

    /**
     * Handle the Issue "restored" event.
     */
    public function restored(Issue $issue): void
    {
        //
    }

    /**
     * Handle the Issue "force deleted" event.
     */
    public function forceDeleted(Issue $issue): void
    {
        //
    }
}
