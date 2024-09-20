<?php

namespace App\Jobs;

use App\Mail\SummaryTaskMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendTaskSummaryEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('SendTaskSummaryEmail job started.');

        $users = User::all();

        foreach ($users as $user) {
            $tasks = $user->tasks()->get();

            Mail::to($user->email)->send(new SummaryTaskMail($tasks));


        Log::info('Email sent to: ' . $user->email);
        }
    }
}
