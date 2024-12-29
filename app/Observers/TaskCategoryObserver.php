<?php

namespace App\Observers;

use App\Models\TaskCategory;
use Illuminate\Support\Str;

class TaskCategoryObserver
{
    /**
     * Handle the TaskCategory "creating" event.
     */
    public function creating(TaskCategory $taskCategory): void
    {
        if (empty($taskCategory->id)) {
            $taskCategory->id = (string) Str::uuid(); // Generate UUID if not already set
        }
    }

}
