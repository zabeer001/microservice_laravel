<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TestJob implements ShouldQueue
{
    use Queueable;

  
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo 'event has been handled'.PHP_EOL;
    }
}
