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
        ->select(['productdetail.id as id', 'color' , 'price','model','quantity', 
                'idWareHouse',  'warehouse.name as nameWareHouse', 
                'idProduct','product.name as nameProduct','type',
                'idSupplier', 'supplier.name as nameSupplier'])
        ->get();
    }

    static function get($id){
        return $productdetail = DB::table('productdetail')
        ->join('warehouse', 'productdetail.idWareHouse', '=', 'warehouse.id')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->join('supplier', 'productdetail.idSupplier', '=', 'supplier.id')
        ->select(['productdetail.id as id', 'color' , 'price','model','quantity', 
                'idWareHouse',  'warehouse.name as nameWareHouse', 
                'idProduct','product.name as nameProduct','type',
                'idSupplier', 'supplier.name as nameSupplier'])
        ->where('id', '=' ,$id)
        ->first();
    }
    static function store( $product_detail_color,$product_detail_price,
    $product_detail_model,$product_detail_quantity,$idwarehouse,$idproduct,$idsupplier){
        return DB::table('productdetail')->insert([
            'color' => $product_detail_color , 
            'price'=> $product_detail_price,
            'model' => $product_detail_model,
            'quantity' => $product_detail_quantity,
            'idWareHouse' => $idwarehouse,
            'idProduct' => $idproduct,
            'idSupplier' =>$idsupplier
        ]);
    }
    public function category(){
        return $this -> belongsTo('App\CategoryModel','model'); 
    }
    protected $table = 'productdetail';

    protected $fillable = [ 'id', 'color', 'price', 'model', 'quantity', 'idWareHouse', 'idProduct', 'idSupplier'];
}
