<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    //
    // public function get(){
    //     $data['show_product'] = CategoryModel::paninate(6);

    //     return view('web.cars',$data);
    // }
    public function index()
    {

        $data = CategoryModel::simplePaginate(6);
        $show_product = DB::table('productdetail')
        ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
        ->select(['productdetail.id as id', 'color' , 'price','model','quantity', 
                'idWareHouse',  'warehouse.name as nameWareHouse', 
                'idProduct','product.name as nameProduct','type',
                'idSupplier', 'supplier.name as nameSupplier'])
        ->get();

        $img = [];
        foreach ($show_product as $key => $value) {
            $img = DB::table('image')
                ->where('idProductDetail', $value->id)
                ->get();
            $show_product[$key]->image = $img;
        }
        // dd($show_product);
        return view('web.cars',['show_products'=>$data],compact('show_product'));
    }
    public function indexaccessary()
    {
        return view('web.accessary');
    }
    public function indexhelmet()
    {
        return view('web.helmet');
    }
    public function indexcaroil()
    {
        return view('web.car-oil');
    }

    public function indexdetail($id)
    {
         $show_product_detail = DB::table('productdetail')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->select(['productdetail.id as id', 'color' ,'price','model','quantity', 
                'idProduct','product.name as nameProduct','type','product.description'
                ])
        ->where('productdetail.id','=', $id)
        ->get();

        $img = [];
        foreach ($show_product_detail as $key => $value) {
            $img = DB::table('image')
                ->where('idProductDetail', $value->id)
                ->get();
            $show_product_detail[$key]->image = $img;
        }
        // dd($show_product_detail);

        return view('web.car-details',compact('show_product_detail'),['idCars'=>$id]);
    }

    public function home()
    {
         $show_product_detail = DB::table('productdetail')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->select(['productdetail.id as id', 'color' ,'price','model','quantity', 
                'idProduct','product.name as nameProduct','type','product.description'
                ])
                ->skip(6)->take(6)
        ->get();

        $img = [];
        foreach ($show_product_detail as $key => $value) {
            $img = DB::table('image')
                ->where('idProductDetail', $value->id)
                ->get();
            $show_product_detail[$key]->image = $img;
        }

        return view('web.home',compact('show_product_detail'));
    }
}
