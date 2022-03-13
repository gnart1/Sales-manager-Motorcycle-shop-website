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
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->select(['productdetail.id as id', 'productdetail.color' , 'productdetail.price','productdetail.image','productdetail.model','productdetail.quantity', 
        'productdetail.idProduct','product.name as name','product.type','product.description'])
        ->where('product.type','=',1)
        ->get();
        //dd($show_product);
        return view('web.cars',['show_product'=>$data],compact('show_product'));
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
         $show_product_detail = CategoryModel::find($id);
        return view('web.car-details',['show_product_detail'=>$show_product_detail]);
    }
}
