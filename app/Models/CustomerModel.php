<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerModel extends Model
{
    use HasFactory;
    static function getAll(){
        return DB::table('customer')
        ->get();
    }

    static function get($id){
        $customer = DB::table('customer')->where('id', '=' ,$id)->get();
        return $customer[0];
    }
    static function store($admin_name,$admin_phone,$admin_address,$admin_email,$admin_position,$admin_role){
        return DB::table('admin')->insert([
            'name' => $admin_name,
            'phone' => $admin_phone,
            'address' => $admin_address,
            'email' => $admin_email,
            'position' => $admin_position,
            'role' => $admin_role
        ]);
    }

    static function edit($admin_name,$admin_phone,$admin_address,$admin_email,$admin_position,$admin_role, $id){
        return DB::table('admin')->where('id', '=', $id)->update([
            'name' => $admin_name,
            'phone' => $admin_phone,
            'address' => $admin_address,
            'email' => $admin_email,
            'position' => $admin_position,
            'role' => $admin_role
        ]);

    }
    static function remove($phone){
        return DB::table('customer')->where('phone', '=', $phone)->delete();
    }
}
