<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\ProductDetailModel;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productdetails = ProductDetailModel::getAll();
        return view('pages.product-detail.product-detail', ['productdetails' => $productdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product-detail.create-product-detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_detail_color = $request->input('color');
        $product_detail_price = $request->input('price');
        $product_detail_image = $request->input('image');
        $product_detail_model = $request->input('model');
        $product_detail_quantity = $request->input('quantity');
        $idwarehouse = $request->input('idWareHouse');
        $idproduct = $request->input('idProduct');
        $idsupplier = $request->input('idSupplier');
        $result = ProductDetailModel::store( $product_detail_color,$product_detail_price,
        $product_detail_image,$product_detail_model,$product_detail_quantity,$idwarehouse,$idproduct,$idsupplier);

        if($result == true){
            return redirect('/product-detail');
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
