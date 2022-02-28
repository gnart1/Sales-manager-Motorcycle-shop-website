<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\ProductDetailModel;
use App\Models\SupplierModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    
    public function index()
    {
        $productdetails = ProductDetailModel::getAll();
        return view('pages.product-detail.product-detail', ['productdetails' => $productdetails]);
    }

    public function create()
    {
        $warehouses = WarehouseModel::getAll();
        $suppliers = SupplierModel::getAll();
        return view('pages.product-detail.create-product-detail',  ['warehouses' => $warehouses, 'suppliers' => $suppliers]);
    }

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

   
    public function show(c $c)
    {
        //
    }

    public function edit(c $c)
    {
        //
    }

    public function update(Request $request, c $c)
    {
        //
    }

    public function destroy(c $c)
    {
        //
    }
}
