<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $fullName;
    public string $email;
    public string $verifyUrl;

    public function __construct(string $fullName, string $email, string $verifyUrl)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->verifyUrl = $verifyUrl;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)
            ->send(new EmailVerificationMail($this->fullName, $this->verifyUrl));
    }
}
