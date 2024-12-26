<?php

namespace App\Models;

use App\Enums\TaskPriority;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Enums\TaskStatus;

class Task extends Model
{
    use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Automatically generate UUID for new records
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Define the primary key as UUID
    protected $keyType = 'string';
    public $incrementing = false;

    // Cast attributes
    protected $casts = [
        'title'=> 'string',
        'description'=> 'string',
        'priority'=> TaskPriority::class,
        'status' => TaskStatus::class, // Cast status to Enum
        'created_at' => 'datetime',    // Ensure created_at is cast to a Carbon instance
        'updated_at' => 'datetime',    // Ensure updated_at is cast to a Carbon instance
    ];
}
