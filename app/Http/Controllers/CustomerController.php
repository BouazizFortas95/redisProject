<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function checkCustomer(Request $request) {
        // dd($request->all());
        info('LINE : 12');
        $customer = Customer::whereNationalNum($request->national_num)->first();
        if ($customer) { // update
            info('LINE : 15');
            $customer->update($request->all());
        } else { // create
            info('LINE : 18');
           Customer::create([
                "name" => $request->name,
                "national_num"=> $request->national_num,
                "email"=> $request->email,
                "subscribtion_end_date"=> $request->subscribtion_end_date
           ]);
        }
    }
}
