<?php

namespace App\Console\Commands;

use App\Jobs\SendSubscribtionExpriredMessageJob;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SubscribtionExpiryNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribtion-app:subscribtion-expiry-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check which subscribed customers has been expired.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expired_customers = Customer::where('subscribtion_end_date', '<', now())->get();

        foreach ($expired_customers as $key => $customer) {
            // info('Iam on loop from command class in line 34.');
            $expired_date = Carbon::createFromFormat('Y-m-d', $customer->subscribtion_end_date)->toDateString();
            dispatch(new SendSubscribtionExpriredMessageJob($customer, $expired_date))->onQueue("FARES");
        }

    }
}
