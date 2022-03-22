<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Calendar;
use App\Models\Image;
use App\Models\ProductDetailModel;
use App\Models\SupplierModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductModel;

class ProductDetailController extends Controller
{

    public function index()
    {
        $productdetails = DB::table('productdetail')
            ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
            ->join('product', 'productdetail.idProduct', '=', 'product.id')
            ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
            ->select([
                'productdetail.id as id', 'color', 'price', 'model', 'quantity',
                'idWareHouse',  'warehouse.name as nameWareHouse',
                'idProduct', 'product.name as nameProduct', 'type',
                'idSupplier', 'supplier.name as nameSupplier'
            ])
            ->get();

        $img = [];
        foreach ($productdetails as $key => $value) {
            $img = DB::table('image')
                ->where('idProductDetail', $value->id)
                ->get();
            $productdetails[$key]->image = $img;
        }

        return view('pages.product-detail.product-detail', ['productdetails' => $productdetails]);
    }

    public function create()
    {
        $warehouses = WarehouseModel::getAll();
        $suppliers = SupplierModel::getAll();
        $product = ProductModel::getAll();
        return view('pages.product-detail.create-product-detail',  ['warehouses' => $warehouses, 'suppliers' => $suppliers, 'product' => $product]);
    }

    public function store(Request $request)
    {
        $name = DB::table('product')->where('name', '=', $request->input('name'))->first();
        $check = $name->name ?? '';
        if ($request->input('name') != $check) {
            $product = new ProductModel();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->type = $request->input('type');
            $product->save();

            $product_detail = new ProductDetailModel();
            $product_detail->color = $request->input('color');
            $product_detail->price = $request->input('price');
            $product_detail->model = $request->input('model');
            $product_detail->quantity = $request->input('quantity');
            $product_detail->idWarehouse = $request->input('idWarehouse');
            $product_detail->idProduct =  $product->id;
            $product_detail->idSupplier = $request->input('idSupplier');
            $product_detail->save();

            $image = new Image();
            if ($request->has('file_upload')) {
                $file = $request->file_upload;
                $extension = $request->file_upload->extension();
                $file_name = time() . '-' . 'product.' . $extension;
                // dd($file_name);
                $file->move(public_path('assets/images'), $file_name);

                $request->merge(['image' => $file_name]);
                $image->idProductDetail = $product_detail->id;
                $image->image = $file_name;
            }
            $image->save();
        } else {
            $checkDetail = DB::table('productdetail')->where('idProduct', '=', $name->id)->first();
            $check3 = $checkDetail->color ?? '';
            $check4 = $checkDetail->model ?? '';
            $check5 = $checkDetail->price ?? '';
            $check6 = $checkDetail->idWareHouse ?? '';
            $check7 = $checkDetail->idSupplier ?? '';
            if (
                $check3 != $request->input('color') && $check4 !== $request->input('model')
                && $check5 != $request->input('price') && $check6 != $request->input('idWarehouse') && $check7 !== $request->input('idSupplier')
            ) {
                $product_detail = new ProductDetailModel();
                $product_detail->color = $request->input('color');
                $product_detail->price = $request->input('price');
                $product_detail->model = $request->input('model');
                $product_detail->quantity = $request->input('quantity');
                $product_detail->idWarehouse = $request->input('idWarehouse');
                $product_detail->idProduct =  $name->id;
                $product_detail->idSupplier = $request->input('idSupplier');
                $product_detail->save();

                $image = new Image();
                if ($request->has('file_upload')) {
                    $file = $request->file_upload;
                    $extension = $request->file_upload->extension();
                    $file_name = time() . '-' . 'product.' . $extension;
                    // dd($file_name);
                    $file->move(public_path('assets/images'), $file_name);

                    $request->merge(['image' => $file_name]);
                    $image->idProductDetail = $product_detail->id;
                    $image->image = $file_name;
                }
                $image->save();
            }
        }


        return redirect('/productdetail');
    }

    public function storeChoose(Request $request)
    {
        $product_detail = new ProductDetailModel();

        $checkDetail = DB::table('productdetail')->where('idProduct', '=', $request->input('idProduct'))->first();
        $check3 = $checkDetail->color ?? '';
        $check4 = $checkDetail->model ?? '';
        $check5 = $checkDetail->price ?? '';
        $check6 = $checkDetail->idWareHouse ?? '';
        $check7 = $checkDetail->idSupplier ?? '';
        if (
            $check3 != $request->input('color') && $check4 !== $request->input('model')
            && $check5 != $request->input('price') && $check6 != $request->input('idWarehouse') && $check7 !== $request->input('idSupplier')
        ) {
            $product_detail->color = $request->input('color');
            $product_detail->price = $request->input('price');
            $product_detail->model = $request->input('model');
            $product_detail->quantity = $request->input('quantity');
            $product_detail->idWarehouse = $request->input('idWarehouse');
            $product_detail->idProduct =  $request->input('idProduct');
            $product_detail->idSupplier = $request->input('idSupplier');
            $product_detail->save();

            $image = new Image();
            if ($request->has('file_upload')) {
                $file = $request->file_upload;
                $extension = $request->file_upload->extension();
                $file_name = time() . '-' . 'product.' . $extension;
                // dd($file_name);
                $file->move(public_path('assets/images'), $file_name);

                $request->merge(['image' => $file_name]);
                $image->idProductDetail = $product_detail->id;
                $image->image = $file_name;
            }
            $image->save();
        }
        return redirect('/productdetail');
    }

    public function gallery($id)
    {
        $productdetails = DB::table('productdetail')
            ->join('product', 'productdetail.idProduct', '=', 'product.id')
            ->select([
                'productdetail.id as id', 'color', 'price', 'model', 'quantity',
                'idProduct', 'product.name as nameProduct', 'type', 'product.description'
            ])
            ->where('productdetail.id', '=', $id)
            ->get();

        $img = [];
        foreach ($productdetails as $key => $value) {
            $img = DB::table('image')
                ->where('idProductDetail', $value->id)
                ->get();
            $productdetails[$key]->image = $img;
        }

        return view('pages.gallery.add-gallery', ['productdetails' => $productdetails]);
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
