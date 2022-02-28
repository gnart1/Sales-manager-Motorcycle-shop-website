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

    static function get($customer_phone){
        $customer = DB::table('customer')->where('phone', '=', $customer_phone)->get();
        return $customer[0];
    }
    static function store($customer_name,$customer_phone,$customer_address,$customer_email,$customer_dob){
        return DB::table('customer')->insert([
            'name' => $customer_name,
            'phone' => $customer_phone,
            'address' => $customer_address,
            'email' => $customer_email,
            'dob' => $customer_dob
            
        ]);
    }

    static function edit($customer_name,$customer_phone,$customer_address,$customer_email,$customer_dob, $id){
        return DB::table('customer')->where('phone', '=', $customer_phone)->update([
            'name' => $customer_name,
            'phone' => $customer_phone,
            'address' => $customer_address,
            'email' => $customer_email,
            'dob' => $customer_dob
            
        ]);

    }
    static function remove($customer_phone){
        return DB::table('customer')->where('phone', '=', $customer_phone)->delete();
    }
}
