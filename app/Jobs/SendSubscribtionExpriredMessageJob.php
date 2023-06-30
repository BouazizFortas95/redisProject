<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSubscribtionExpriredMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $customer, $expire_date;
    /**
     * Create a new job instance.
     */
    public function __construct($customer, $expire_date)
    {
        $this->customer = $customer;
        $this->expire_date = $expire_date;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //ToDo send email for each expired user
        // info('Iam from Job class in line 32.');

        sendMail('emails.subscribtion_expired', $this->customer->email,
        'Your subscribtion has been expired', [$this->customer]);
    }
}
