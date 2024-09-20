<?php

namespace App\Listeners;

use App\Events\TaskStatusUpdated;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Traits\NotificationTrait;

class SendTaskStatusNotification
{
    use NotificationTrait;
    /**
     * Create the event listener.
     */
    public function handle(TaskStatusUpdated $event)
    {
        $task = $event->task;
        $user = User::find($task->user_id);
        $token = $user->device_token;

        // Send notification using your existing method
        $this->send("The status now changed", "Update status", $token);

        // Store the notification in the database
        $note = new Notification();
        $note->content = "The status has changed successfully!";
        $note->user_id = $user->id;
        $note->title = "Update Status";
        $note->save();
    }
}
