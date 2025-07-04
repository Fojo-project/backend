<?php

namespace App\Jobs;

use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendResetPasswordMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public string $name;
    public string $email;
    public string $url;

    public function __construct(string $name, string $email, string $url)
    {
        $this->name = $name;
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new ResetPasswordMail($this->name, $this->url));
    }
}
