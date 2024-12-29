<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    protected $keyType = 'string'; // Set the key type to string for UUID
    public $incrementing = false; // Disable auto-increment for UUID


    // Define the relationship to tasks (many-to-many)
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_category_task', 'category_id', 'task_id');
    }
}
