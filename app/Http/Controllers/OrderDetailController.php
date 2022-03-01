<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\OrderDetailModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;
class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderdetails = OrderDetailModel::getAll();
        return view('pages.order-detail.order-detail', ['orderdetails' => $orderdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = CustomerModel::getAll();
        return view('pages.order-detail.create-order-detail',['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new OrderModel();
        $order ->name = $request->input('name');
        $order->datetime = $request->input('datetime');
        $order->type = $request->input('type');
        $order->total_amount = $request->input('total_amount');
        $order->idAdmin = Auth::guard('admin')->user()->id;
        $order->phoneCustomer = $request->input('phoneCustomer');
        $order-> save();

        $order_detail_quantity = $request->input('quantity');
        $idOrder = $order->id;
        $idProductDetail = $request->input('idProductDetail');
        $result = OrderDetailModel::store($order_detail_quantity,$idOrder,$idProductDetail);

        if($result == true){
            return redirect('/orderdetail');
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
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
