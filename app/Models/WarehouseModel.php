<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WarehouseModel extends Model
{
    use HasFactory;

    static function getAll(){
        return DB::table('warehouse')
        ->get();
    }

    static function get($id){
        $warahouse = DB::table('warehouse')->where('id', '=' ,$id)->get();
        return $warahouse[0];
    }
    static function store($warehouse_name,$warehouse_address){
        return DB::table('warehouse')->insert([
            'name' => $warehouse_name,
            'address' => $warehouse_address
        ]);
    }

    static function edit($warehouse_name, $warehouse_address, $id){
        return DB::table('warehouse')->where('id', '=', $id)->update([
            'name' => $warehouse_name,
            'address' => $warehouse_address
        ]);

    }
    static function remove($id){
        return DB::table('warehouse')->where('id', '=', $id)->delete();
    }
}
