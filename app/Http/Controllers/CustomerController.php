<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return $customers->map(function($customer){
            return [
                'customer_id' => $customer->customer_id,
                'first_name'  => $customer->first_name,
                'last_name' => $customer->last_name,
                'address' => $customer->address,
                'city' => $customer->city,
                'state' => $customer->state,
                'points' => $customer->points,
                'is_golden_member' => $customer->goldMember() ? true : false,
            ];
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
}

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
