<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    function list(){
        return view("orders-list", [
            "orders" => Order::paginate(10)
        ]);
    }
    function detail($id){
        return view("orders-detail", ["order" => Order::find($id)]);
    }

    function createForm(){
        return view("orders-create", ["customers" => Customer::all()]);
    }

    function create(Request $request){
        $order = new Order();
        $order->orderNumber = $request->input("orderNumber");
        $order->status = $request->input("status");
        $order->comments = $request->input("comments");
        $order->customerNumber = $request->input("customerNumber");
        $order->orderDate = new DateTime('now');
        $order->requiredDate = new DateTime('now');
        $order->save();
        return redirect("/orders");
    }
}

