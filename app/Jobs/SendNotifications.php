<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string
     */
    private $target;
    private $data;

    /**
     * Create a new job instance.
     *
     * @param string $target
     * @param $data
     */
    public function __construct(string $target, $data)
    {
        $this->target = $target;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::admins()->get()->each(function (User $user) {
            $user->notify(new $this->target($this->data));
        });
    }
}
