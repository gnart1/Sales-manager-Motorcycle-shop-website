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
}
