<?php

namespace App\Console\Commands\Redis;

use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class FillRedis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-redis';

    /**
     * The console fill redis DB from mysql database..
     *
     * @var string
     */
    protected $description = 'fill redis DB from mysql database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $customers = Customer::select('id', 'national_num')->get();

        if (isset($customers)  && !empty($customers)) {
            foreach ($customers as $key => $customer) {
                Redis::set('national_'.$customer->national_num, $customer->id);
            }
        }
    }
}
