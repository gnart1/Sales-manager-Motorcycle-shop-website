<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\c;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = CustomerModel::getAll();
        return view('pages.customer.customer', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.create-customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin_name = $request->input('name');
        $admin_phone = $request->input('phone');
        $admin_address = $request->input('address');
        $admin_email = $request->input('email');
        $admin_position = $request->input('position');
        $admin_role = $request->input('role');
        $result = CustomerModel::store( $admin_name,$admin_phone,$admin_address,$admin_email,$admin_position,$admin_role);

        if($result == true){
            return redirect('/admin');
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
        $admin = CustomerModel::get($id);
        return view('pages.admin.edit-admin', ['admin'=> $admin]);
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
        $admin_name = $request->input('name');
        $admin_phone = $request->input('phone');
        $admin_address = $request->input('address');
        $admin_email = $request->input('email');
        $admin_position = $request->input('position');
        $admin_role = $request->input('role');
        $affected = CustomerModel::edit($admin_name,$admin_phone,$admin_address,$admin_email,$admin_position,$admin_role, $id);
        if($affected){

            return redirect('/admin');
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
    public function destroy($phone)
    {
        $affected = CustomerModel::remove($phone);
        if($affected){
            return redirect("/customer");
        }else{
            echo("ERRO");
            die();
        }
    }
}