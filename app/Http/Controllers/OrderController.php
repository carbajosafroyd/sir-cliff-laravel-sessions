<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOrders = Order::with('category')->get();
        return view('order', ['orders' => $allOrders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategories = Category::all();     
        return view('add_order', ['categories' => $allCategories]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Order::create($input);
        return redirect('order')->with(' flash_message', 'Order Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $allCategories = Category::all();
        $selectedOrder = Order::find($order->id);
        return view('edit_order',['categories' => $allCategories, 'order' => $selectedOrder]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $orders =  Order::find($id);
        $input = $request->all();
        $orders->update($input);
        return redirect('orders')->with(' flash_message', 'Order Updated Successfully!');
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Order::destroy($id);
        return redirect('orders')->with(' flash_message', 'Order Deleted Successfully!');
    }
}
