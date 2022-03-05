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
        $product = ProductModel::getAll();
        return view('pages.product-detail.create-product-detail',  ['warehouses' => $warehouses, 'suppliers' => $suppliers,'product' => $product]);
    }

    public function store(Request $request)
    {
        $product = new ProductModel();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->type = $request->input('type');
        $product-> save();

        $product_detail= new ProductDetailModel();

        $product_detail->color = $request->input('color');
        $product_detail->price = $request->input('price');
        $product_detail->image = $request->input('image');
        $product_detail->model = $request->input('model');
        $product_detail->quantity = $request->input('quantity');
        $product_detail->idWarehouse = $request->input('idWarehouse');
        $product_detail->idProduct =  $product->id;
        $product_detail->idSupplier = $request->input('idSupplier');

        $product_detail-> save();

        return redirect('/productdetail');
    }
    public function storeChoose(Request $request)
    {
        $product_detail= new ProductDetailModel();

        $product_detail->color = $request->input('color');
        $product_detail->price = $request->input('price');
        $product_detail->image = $request->input('image');
        $product_detail->model = $request->input('model');
        $product_detail->quantity = $request->input('quantity');
        $product_detail->idWarehouse = $request->input('idWarehouse');
        $product_detail->idProduct =  $request->input('idProduct');
        $product_detail->idSupplier = $request->input('idSupplier');

        $product_detail-> save();

        return redirect('/productdetail');
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
