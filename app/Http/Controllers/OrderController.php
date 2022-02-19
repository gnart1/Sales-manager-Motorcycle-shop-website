<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderModel::getAll();
        return view('pages.order.order', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.order.create-order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_name = $request->input('name');
        $order_datetime = $request->input('datetime');
        $order_type = $request->input('type');
        $order_total_amount = $request->input('total-amount');
        $admin_name = $request->input('admin_name');
        $customer_name = $request->input('customer_name');
        $result = OrderModel::store( $order_name,$order_datetime,$order_type,$order_total_amount,$admin_name,$customer_name);

        if($result == true){
            return redirect('/order');
        }else{
            echo('ERRO');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = OrderModel::get($id);
        return view('pages.order.edit-order', ['order'=> $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order_name = $request->input('name');
        $order_datetime = $request->input('datetime');
        $order_type = $request->input('type');
        $order_total_amount = $request->input('total-amount');
        $admin_name = $request->input('admin_name');
        $customer_name = $request->input('customer_name');
        $affected = OrderModel::edit($order_name,$order_datetime,$order_type,$order_total_amount,$admin_name,$customer_name, $id);
        if($affected){

            return redirect('/order');
        }else{
            echo('ERRO');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = OrderModel::remove($id);
        if($affected){
            return redirect("/order");
        }else{
            echo("ERRO");
            die();
        }
    }
}