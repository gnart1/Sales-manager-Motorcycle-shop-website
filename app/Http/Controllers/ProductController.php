<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::getAll();
        return view('pages.product.product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_name = $request->input('name');
        $product_description = $request->input('description');
        $product_type = $request->input('type');
        $result = ProductModel::store( $product_name,$product_description,$product_type);

        if($result == true){
            return redirect('/product');
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
        $product = ProductModel::get($id);
        return view('pages.product.edit-product', ['product'=> $product]);
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
        $product_name = $request->input('name');
        $product_description = $request->input('description');
        $product_type = $request->input('type');
        $affected = ProductModel::edit($product_name,$product_description,$product_type, $id);
        if($affected){

            return redirect('/product');
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
        $affected = ProductModel::remove($id);
        if($affected){
            return redirect("/product");
        }else{
            echo("ERRO");
            die();
        }
    }
}