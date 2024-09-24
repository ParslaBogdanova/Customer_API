<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'first_name'  => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' =>'required|max:255',
            'state' => 'required|max:255',
            'points' => 'required|integer|min:0',
        ]);
            $customer = Customer::create($fields);
            return $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
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
