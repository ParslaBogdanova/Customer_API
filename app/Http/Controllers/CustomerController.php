<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }
    public function index()
    {
        //Laravel query builder
     $results = DB::table('customers')
    ->join('orders', 
        'customers.customer_id', '=', 'orders.customer_id')
    ->join('order_statuses',
        'orders.status', '=', 'order_statuses.order_status_id')
    ->select('customers.customer_id',
            'customers.first_name',
            'customers.last_name', 
            'customers.address',
            'customers.city',
            'customers.state', 
            'customers.points',
            'orders.order_date',
            'order_statuses.name')
    ->get();
    return response()->json($results);
    }

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
    public function show($customer_id)
    {
        //Raw SQL
     $orders = DB::select('SELECT 
            customers.customer_id,
            customers.first_name, 
            customerS.last_name,
            customers.address,
            orders.order_date 
            FROM customers 
            LEFT JOIN orders
            ON customers.customer_id = orders.customer_id 
            WHERE customers.customer_id = ?', [$customer_id]);
        return $orders;
}

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        Gate::authorize('modify', $customer);

        $fields = $request->validate([
            'first_name'  => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' =>'required|max:255',
            'state' => 'required|max:255',
            'points' => 'required|integer|min:0',
        ]);

        $customer->update($fields);
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Gate::authorize('modify', $customer);
        $customer->delete();
        return ['message'=> 'The customer is deleted.'];
    }
}
