<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\c;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = CustomerModel::getAll();
        return view('pages.customer.customer', ['customers' => $customers]);
    }

    public function create()
    {
        return view('pages.customer.create-customer');
    }

    public function store(Request $request)
    {
        $customer = new CustomerModel();
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->save();

        return redirect('/customer');
    }

    public function Calendar(Request $request)
    {


        $phone = DB::table('customer')->where('phone', '=', $request->input('phone'))->first();
        $check = $phone->phone ?? '0000000000';
        if ($request->input('phone') == $check) {
            $calendar = new Calendar();
            $calendar->calendar = $request->input('calendar');
            $calendar->phoneCustomer = $request->input('phone');
            $calendar->type = $request->input('type');
            $calendar->save();
        } else {
            $customer = new CustomerModel();
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->address = $request->input('address');
            $customer->email = $request->input('email');
            $customer->dob = $request->input('dob');
            $customer->save();

            $calendar = new Calendar();
            $calendar->calendar = $request->input('calendar');
            $calendar->phoneCustomer = $customer->phone;
            $calendar->type = $request->input('type');
            $calendar->save();
        }

        if ($request->input('type')===0) {
            return redirect('/car-details/' . $request->input('id'));
        }else{
            return redirect('/baoDuong');
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
        $customer = CustomerModel::get($id);
        return view('pages.customer.edit-customer', ['customer' => $customer]);
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
        $customer_name = $request->input('name');
        $customer_phone = $request->input('phone');
        $customer_address = $request->input('address');
        $customer_email = $request->input('email');
        $customer_dob = $request->input('dob');
        $affected = CustomerModel::edit($customer_name, $customer_phone, $customer_address, $customer_email, $customer_dob, $id);
        if ($affected) {

            return redirect('/customer');
        } else {
            echo ('ERRO');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($phone)
    {
        $affected = CustomerModel::remove($phone);
        if ($affected) {
            return redirect("/customer");
        } else {
            echo ("ERRO");
            die();
        }
    }
}
