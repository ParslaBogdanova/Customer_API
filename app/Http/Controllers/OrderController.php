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
    public function index($customer_id){
    $orders = Order::where('customer_id', $customer_id)->get();
    return $orders;
    }

    public function store(Request $request){
    }

    public function show($customer_id){
        $customer = Customer::with('orders')->find($customer_id);
        return $customer->orders;
        // $order = Order::where('order_id', $order_id)
        //     ->where('customer_id', $customer_id)
        //     ->first();

    }

    public function update(Request $request){
    }
    public function destroy(){
    }
}
