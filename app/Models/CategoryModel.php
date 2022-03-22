<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    use HasFactory;

    public function productDetail(){
        return $this -> hasMany('App\ProductDetailModel'); 
    }
    protected $table = 'productdetail';
    protected $fillable = [ 'id','name', 'color', 'price', 'model', 'quantity','description', 'idWareHouse', 'idProduct', 'idSupplier'];

}
