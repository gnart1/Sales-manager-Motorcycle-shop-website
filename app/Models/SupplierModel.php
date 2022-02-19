<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupplierModel extends Model
{
    use HasFactory;
    
    static function getAll(){
        return DB::table('supplier')
        ->get();
    }

    static function get($id){
        $supplier = DB::table('supplier')->where('id', '=' ,$id)->get();
        return $supplier[0];
    }
    static function store($supplier_name,$supplier_address, $supplier_email){
        return DB::table('supplier')->insert([
            'name' => $supplier_name,
            'address' => $supplier_address,
            'email' => $supplier_email
        ]);
    }

    static function edit($supplier_name,$supplier_address,$supplier_email, $id){
        return DB::table('supplier')->where('id', '=', $id)->update([
            'name' => $supplier_name,
            'address' => $supplier_address,
            'email' => $supplier_email
        ]);

    }
    static function remove($id){
        return DB::table('supplier')->where('id', '=', $id)->delete();
    }
}
