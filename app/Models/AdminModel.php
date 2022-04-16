<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    use HasFactory;
    static function getAll(){
        return DB::table('admin')
        ->get();
    }

    static function get($id){
        $admin = DB::table('admin')->where('id', '=' ,$id)->get();
        return $admin[0];
    }
    static function store($admin_name,$admin_pass,$admin_phone,$admin_address,$admin_email,$admin_position,$admin_role,$admin_status){
        return DB::table('admin')->insert([
            'name' => $admin_name,
            'password'=>bcrypt($admin_pass),
            'phone' => $admin_phone,
            'address' => $admin_address,
            'email' => $admin_email,
            'position' => $admin_position,
            'role' => $admin_role,
            'status' => $admin_status
        ]);
    }

    static function edit($admin_name,$admin_phone,$admin_address,$admin_email,$admin_position,$admin_role,$admin_status, $id){
        return DB::table('admin')->where('id', '=', $id)->update([
            'name' => $admin_name,
            'phone' => $admin_phone,
            'address' => $admin_address,
            'email' => $admin_email,
            'position' => $admin_position,
            'role' => $admin_role,
            'status' => $admin_status
        ]);

    }
    static function remove($id){
        return DB::table('admin')->where('id', '=', $id)->delete();
    }
}
