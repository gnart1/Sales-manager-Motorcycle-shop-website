<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerModel;
use DateTime;
class OrderController extends Controller
{
  
    public function index()
    {

        $orders = OrderModel::getAll();
        return view('pages.order.order', ['orders' => $orders]);
    }

    public function create()
    {
        $customers = CustomerModel::getAll();
        return view('pages.order.create-order',['customers' => $customers]);
    }


    public function store(Request $request)
    {
        $order_name = $request->input('name');
        $order_datetime = new DateTime();
        $order_type = $request->input('type');
        $idadmin = Auth::guard('admin')->user()->id;
        $phonecustomer = $request->input('phoneCustomer');
        $result = OrderModel::store( $order_name,$order_datetime,$order_type,$idadmin,$phonecustomer);

        if($result == true){
            return redirect('/order');
        }else{
            echo('ERRO');
        }
    }

    public function show(c $c)
    {
        //
    }

    public function edit($id,$type)
    {
        $order = OrderModel::get($id,$type);
        $customers = CustomerModel::getAll();
        return view('pages.order.edit-order', ['order'=> $order,'customers' => $customers]);
    }

    public function update(Request $request, $id)
    {
        $order_name = $request->input('name');
        $order_datetime = new DateTime();
        $order_type = $request->input('type');
        $idadmin = Auth::guard('admin')->user()->id;
        $phonecustomer = $request->input('phoneCustomer');
        $affected = OrderModel::edit($order_name,$order_datetime,$order_type,$idadmin,$phonecustomer, $id);
        if($affected){

            return redirect('/order');
        }else{
            echo('ERRO');
        }
    }


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