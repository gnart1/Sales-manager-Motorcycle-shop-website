<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\SupplierModel;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = SupplierModel::getAll();
        return view('pages.supplier.supplier', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.create-supplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier_name = $request->input('name');
        $supplier_address = $request->input('address');
        $supplier_email = $request->input('email');
        $result = SupplierModel::store($supplier_name,$supplier_address, $supplier_email);

        if($result == true){
            return redirect('/supplier');
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
        $supplier = SupplierModel::get($id);
        return view('pages.supplier.edit-supplier', ['supplier'=> $supplier]);
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
        $supplier_name = $request->input('name');
        $supplier_address = $request->input('address');
        $supplier_email = $request->input('email');
        $affected = SupplierModel::edit($supplier_name,$supplier_address, $supplier_email, $id);
        if($affected){

            return redirect('/supplier');
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
        $affected = SupplierModel::remove($id);
        if($affected){
            return redirect("/supplier");
        }else{
            echo("ERRO");
            die();
        }
    }
}
