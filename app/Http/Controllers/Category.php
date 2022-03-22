<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductDetailModel;
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

        //$data = CategoryModel::simplePaginate(6);
        $show_product = DB::table('productdetail')
        ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
        ->select(['productdetail.id as id', 'color' , 'price','model','quantity', 
                'idWareHouse',  'warehouse.name as nameWareHouse', 
                'idProduct','product.name as nameProduct','type',
                'idSupplier', 'supplier.name as nameSupplier'])
                ->Paginate(6);
        // ->get();

        $img = [];
        foreach ($show_product as $key => $value) {
            $img = DB::table('image')
                ->where('idProductDetail', $value->id)
                ->get();
            $show_product[$key]->image = $img;
        }
        // dd($show_product);
        return view('web.cars',compact('show_product'));
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

    public function show_category(Request $request,$slug_category_product){

        $category_by_slug = CategoryModel::where('slug_category_product',$slug_category_product)->get();

        foreach($category_by_slug as $key => $cate){
            $model = $cate -> model;
        }

        if(isset($_GET['sort_by'])){
             $sort_by = $_GET['sort_by'];
            if($sort_by == 'ABLADE'){
                $category_by_model = DB::table('productdetail')
                ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
                ->join('product', 'productdetail.idProduct', '=', 'product.id')
                ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
                ->where('productdetail.model','=', 'ABLADE')
                ->select(['productdetail.id as id', 'color' , 'price','model','quantity', 
                        'idWareHouse',  'warehouse.name as nameWareHouse', 
                        'idProduct','product.name as nameProduct','type',
                        'idSupplier', 'supplier.name as nameSupplier'])
                        ->simplePaginate(6); 
            }
             
        }
        // else{
        //     $category_by_id =  ProductDetailModel::
        // }
        dd( $category_by_model);
        return view('web.cars',compact('category_by_model'));
    }
}
