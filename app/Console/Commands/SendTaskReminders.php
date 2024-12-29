<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\TaskReminderNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders for tasks due tomorrow';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // احصل على جميع المهام التي تاريخ استحقاقها غدًا
        $tasks = Task::whereDate('due_date', Carbon::tomorrow())->get();

        foreach ($tasks as $task) {
            $task->user->notify(new TaskReminderNotification($task));
        }
        Log::info('Reminders sent successfully for tasks due tomorrow.');
        $this->info('Reminders sent successfully.');
    }
}
