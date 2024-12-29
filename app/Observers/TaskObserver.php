<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Str;

class TaskObserver
{
    /**
     * Handle the Task "creating" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function creating(Task $task)
    {
        if (empty($task->id)) {
            $task->id = (string) Str::uuid(); // Generate UUID if not already set
        }
    }
}
