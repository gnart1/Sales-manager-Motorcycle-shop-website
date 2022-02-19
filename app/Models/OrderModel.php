<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model
{
    use HasFactory;
    static function getAll(){
        return DB::table('orders')
        ->get();
    }

    static function get($id){
        $order = DB::table('orders')->where('id', '=' ,$id)->get();
        return $order[0];
    }
    static function store($order_name,$order_datetime,$order_type,$order_total_amount,$admin_name,$customer_name){
        return DB::table('orders')->insert([
            'name' => $order_name,
            'datetime' => $order_datetime,
            'type' => $order_type,
            'total_amount' => $order_total_amount,
            'idAdmin' => $admin_name,
            'phone' => $customer_name
        ]);
    }

    static function edit($order_name,$order_datetime,$order_type,$order_total_amount,$admin_name,$customer_name, $id){
        return DB::table('orders')->where('id', '=', $id)->update([
            'name' => $order_name,
            'datetime' => $order_datetime,
            'type' => $order_type,
            'total_amount' => $order_total_amount,
            'idAdmin' => $admin_name,
            'phone' => $customer_name
        ]);

    }
    static function remove($id){
        return DB::table('orders')->where('id', '=', $id)->delete();
    }
}
