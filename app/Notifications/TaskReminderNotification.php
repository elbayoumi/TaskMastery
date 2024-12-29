<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskReminderNotification extends Notification
{
    public function __construct(public $task) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reminder: Task Due Tomorrow')
            ->line('Task: ' . $this->task->title)
            ->line('Description: ' . $this->task->description)
            ->line('Due Date: ' . $this->task->due_date->format('Y-m-d'))
            ->action('View Task', url('/tasks/' . $this->task->id))
            ->line('Stay productive with TaskPro!');
    }
}
