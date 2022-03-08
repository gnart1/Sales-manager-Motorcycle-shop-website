<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'productdetail';

    protected $fillable = [ 'id', 'color', 'price', 'image', 'model', 'quantity', 'idWareHouse', 'idProduct', 'idSupplier'];

}
