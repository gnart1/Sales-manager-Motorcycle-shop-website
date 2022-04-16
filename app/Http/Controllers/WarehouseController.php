<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\WarehouseModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $warehouses = WarehouseModel::getAll();
        return view('pages.warehouse.warehouse', ['warehouses' => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.warehouse.create-warehouse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warehouse_name = $request->input('name');
        $warehouse_address = $request->input('address');
        $result = WarehouseModel::store($warehouse_name,$warehouse_address);

        if($result == true){
            return redirect('/warehouse')
             ->withStatus(__('Thêm kho thành công.'));
            
             
            
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
        $warehouse = WarehouseModel::get($id);
        return view('pages.warehouse.edit-warehouse', ['warehouse'=> $warehouse]);
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
        $warehouse_name = $request->input('name');
        $warehouse_address = $request->input('address');
        $affected = WarehouseModel::edit($warehouse_name,$warehouse_address, $id);
        if($affected){
             return redirect('/warehouse')->withStatus(__('Sửa kho thành công.'));
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
       
            $affected = WarehouseModel::remove($id);
            if($affected){
                return redirect("/warehouse") ->withStatus(__('Xóa kho thành công.'));
            }else{
                echo("ERRO");
                die();
        }
    }
}
