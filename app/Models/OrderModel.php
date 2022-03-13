<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class OrderModel extends Model
{
    use HasFactory;
    static function getAll()
    {
        $xuat = DB::table('orders')
            ->join('admin', 'orders.idAdmin', '=', 'admin.id')
            ->join('customer', 'orders.phoneCustomer', '=', 'customer.phone')
            ->select(['orders.id as id', 'orders.name as nameOr', 'datetime', 'type', 'idAdmin',  'admin.name as nameAdmin', 'phoneCustomer', 'customer.name as nameCustomer'])
            ->get();

        $Nhap = DB::table('orders')
            ->join('admin', 'orders.idAdmin', '=', 'admin.id')
            ->where('phoneCustomer', '=', null)
            ->select(['orders.id as id', 'orders.name as nameOr', 'datetime', 'type', 'idAdmin',  'admin.name as nameAdmin'])
            ->get();

        $array = Arr::collapse([$xuat, $Nhap]);
        return $array;
    }

    static function get($id, $type)
    {
        if ($type == 0) {
            return DB::table('orders')
                ->join('admin', 'orders.idAdmin', '=', 'admin.id')
                ->select(['orders.id', 'orders.name as nameOr', 'datetime', 'type', 'idAdmin',  'admin.name as nameAdmin'])
                ->where('orders.id', '=', $id)
                ->first();
        } else {
            return DB::table('orders')
                ->join('admin', 'orders.idAdmin', '=', 'admin.id')
                ->join('customer', 'orders.phoneCustomer', '=', 'customer.phone')
                ->select(['orders.id', 'orders.name as nameOr', 'datetime', 'type', 'idAdmin',  'admin.name as nameAdmin', 'phoneCustomer', 'customer.name as nameCustomer'])
                ->where('orders.id', '=', $id)
                ->first();
        }
    }
    static function store($order_name, $order_datetime, $order_type, $idadmin, $phonecustomer)
    {
        return DB::table('orders')->insert([
            'name' => $order_name,
            'datetime' => $order_datetime,
            'type' => $order_type,
            'idAdmin' => $idadmin,
            'phoneCustomer' => $phonecustomer
        ]);
    }

    static function edit($order_name, $order_datetime, $order_type, $idadmin, $phonecustomer, $id)
    {
        return DB::table('orders')->where('id', '=', $id)->update([
            'name' => $order_name,
            'datetime' => $order_datetime,
            'type' => $order_type,
            'idAdmin' => $idadmin,
            'phoneCustomer' => $phonecustomer
        ]);
    }
    static function remove($id)
    {
        return DB::table('orders')->where('id', '=', $id)->delete();
    }

    protected $table = 'orders';

    protected $fillable = ['id', 'name', 'datetime', 'type', 'idAdmin', 'phoneCustomer'];
}
