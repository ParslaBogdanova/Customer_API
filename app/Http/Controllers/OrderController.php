<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class OrderController extends Controller
{
<<<<<<< HEAD
    public function index(Customer $customer)
    {
        return $customer->orders;

        // $customer = Customer::findOrFail($customer_id);
        // $orders = $customer->orders()
        //     ->select('orders.order_id', 'orders.customer_id', 'orders.order_date', 'orders.comments', 'orders.shipped_date', 'orders.shipper_id', 'order_statuses.name as status_name') // Specify only the fields you want
        //     ->join('order_statuses', 'orders.status', '=', 'order_statuses.order_status_id') // Use the correct status column for joining
        //     ->get();
    
        // return response()->json($orders, 200);
    }
    public function store(Request $request){
        // $fields = $request->validate([
        //     'first_name'  => 'required|max:255',
        //     'last_name' => 'required|max:255',
        //     'address' => 'required|max:255',
        //     'city' =>'required|max:255',
        //     'state' => 'required|max:255',
        //     'points' => 'required|integer|min:0',
        // ]);
        //     $customer = Customer::create($fields);
        //     return $customer;
=======
    public function index($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $orders = $customer->orders()
            ->select('orders.order_id', 'orders.customer_id', 'orders.order_date', 'orders.comments', 'orders.shipped_date', 'orders.shipper_id', 'order_statuses.name as status_name') // Specify only the fields you want
            ->join('order_statuses', 'orders.status', '=', 'order_statuses.order_status_id') // Use the correct status column for joining
            ->get();
    
        return response()->json($orders, 200);
>>>>>>> 846a458058e1841dd59c3f6f2e5179991bc1fe69
    }
    


<<<<<<< HEAD
    public function show(Customer $customer, Order $order)
    {
        return $order;
    //     $order = DB::table('orders')
    //     ->join('order_statuses', 'orders.status', '=', 'order_statuses.order_status_id')
    //     ->where('orders.order_id', $order_id)
    //     ->where('orders.customer_id', $customer_id)
    //     ->select('orders.*', 'order_statuses.name as status_name')
    //     ->first();

    // if (!$order) {
    //     return response()->json(['message' => 'Order not found'], 404);
    // }

    // return response()->json($order, 200);
    }
}
=======
    public function show($customer_id, $order_id)
    {
        $order = DB::table('orders')
        ->join('order_statuses', 'orders.status', '=', 'order_statuses.order_status_id')
        ->where('orders.order_id', $order_id)
        ->where('orders.customer_id', $customer_id)
        ->select('orders.*', 'order_statuses.name as status_name')
        ->first();

    if (!$order) {
        return response()->json(['message' => 'Order not found'], 404);
    }

    return response()->json($order, 200);
    }
}
>>>>>>> 846a458058e1841dd59c3f6f2e5179991bc1fe69
