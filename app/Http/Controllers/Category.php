<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    //
    public function index()
    {
         $show_product = CategoryModel::where('type',1)
         
        ->join('productdetail', 'product.id', '=', 'productdetail.idProduct')
        ->select(['productdetail.id as id', 'color' , 'price','image','model','quantity', 
        'idProduct','product.name as name','type',])
         ->get();
        //dd($show_product);
        return view('web.cars',compact('show_product'));
    }

    public function indexdetail($id)
    {
        
         $show_product_detail = CategoryModel::find($id);
        return view('web.car-details',['show_product_detail'=>$show_product_detail]);
    }
}
