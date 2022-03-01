<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\ProductDetailModel;
use App\Models\SupplierModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use App\Models\ProductModel;
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
        $product = new ProductModel();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->type = $request->input('type');
        $product-> save();

        $product_detail_color = $request->input('color');
        $product_detail_price = $request->input('price');
        $product_detail_image = $request->input('image');
        $product_detail_model = $request->input('model');
        $product_detail_quantity = $request->input('quantity');
        $idWarehouse = $request->input('idWarehouse');
        $idProduct = $product->id;
        $idSupplier = $request->input('idSupplier');
        $result = ProductDetailModel::store( $product_detail_color,$product_detail_price,
        $product_detail_image,$product_detail_model,$product_detail_quantity,$idWarehouse,$idProduct,$idSupplier);

        if($result == true){
            return redirect('/productdetail');
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
