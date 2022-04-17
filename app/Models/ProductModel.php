<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    use HasFactory;
    static function getAll(){
        return DB::table('product')
        ->get();
    }

    static function get($id){
        $product = DB::table('product')->where('id', '=' ,$id)->get();
        return $product[0];
    }
    static function store($product_name,$product_description,$product_type){
        return DB::table('product')->insert([
            'name' => $product_name,
            'description' => $product_description,
            'type' => $product_type
        ]);
    }

    static function edit($product_name,$product_description,$product_type, $id){
        return DB::table('product')->where('id', '=', $id)->update([
            'name' => $product_name,
            'description' => $product_description,
            'type' => $product_type
        ]);

    }
    static function remove($id){
        return DB::table('product')->where('id', '=', $id)->delete();
    }
    static function getFavouriteProduct() {
        return DB::select('SELECT product.name, SUM(product_in_order.quantity) as total FROM product_in_order          
            INNER JOIN orderdetail ON product_in_order.idOrderDetail = orderdetail.id
            INNER JOIN orders ON orderdetail.idOrder = orders.id AND `type` = 1
            INNER JOIN productdetail ON product_in_order.idProductDetail = productdetail.id 
            INNER JOIN product ON productdetail.idProduct = product.id 
            GROUP BY product.name ORDER BY total  DESC');
    }

    protected $table = 'product';

    protected $fillable = [ 'id', 'name', 'description', 'type', 'created_at', 'updated_at'];
}
