<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductDetailModel extends Model
{
    use HasFactory;

    static function getAll(){
        return DB::table('productdetail')
        ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
        ->select(['productdetail.id as id', 'color' , 'price','image','model','quantity', 
                'idWareHouse',  'warehouse.name as nameWareHouse', 
                'idProduct','product.name as nameProduct','type',
                'idSupplier', 'supplier.name as nameSupplier'])
        ->get();
    }

    static function get($id){
        $order = DB::table('productdetail')->where('id', '=' ,$id)->get();
        return $order[0];
    }
    static function store( $product_detail_color,$product_detail_price,
    $product_detail_image,$product_detail_model,$product_detail_quantity,$idwarehouse,$idproduct,$idsupplier){
        return DB::table('productdetail')->insert([
            'color' => $product_detail_color , 
            'price'=> $product_detail_price,
            'image' => $product_detail_image,
            'model' => $product_detail_model,
            'quantity' => $product_detail_quantity,
            'idWareHouse' => $idwarehouse,
            'idProduct' => $idproduct,
            'idSupplier' =>$idsupplier
        ]);
    }
}
