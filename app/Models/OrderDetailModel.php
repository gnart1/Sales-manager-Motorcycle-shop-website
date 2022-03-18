<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetailModel extends Model
{
    use HasFactory;

    static function getAll(){
        return DB::table('orderdetail')
        ->join('orders', 'orderdetail.idOrder', '=', 'orders.id')
        ->join('productdetail', 'orderdetail.idProductDetail', '=', 'productdetail.id')
        ->join('product', 'productdetail.idProduct', '=', 'product.id')
        ->select(['orderdetail.id as id', 'orderdetail.quantity as quantity',
                'idOrder',  'orders.name as nameOrder','orders.datetime as datetime','orderdetail.total_amount', 
                'idProductDetail','productdetail.idProduct as idProduct','product.name as nameProduct','product.type as type','price'])
        ->get();
    }

    static function get($id){
        $orderdetail = DB::table('orderdetail')->where('id', '=' ,$id)->get();
        return $orderdetail[0];
    }
    static function store( $order_detail_quantity,$order_total_amount,$idorder,$idproductdetail){
        return DB::table('orderdetail')->insert([
            'quantity' => $order_detail_quantity, 
            'idOrder'=> $idorder,
            'idProductDetail' => $idproductdetail,
            'total_amount' => $order_total_amount
        ]);
    }

    protected $table = 'orderdetail';

    protected $fillable = [ 
        'id',
        'quantity',
        'name',
        'datetime',
        'idOrder',
        'idProductDetail',
        'total_amount',
        'created_at',
        'updated_at'];
}
