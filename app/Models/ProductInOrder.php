<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductInOrder extends Model
{
    use HasFactory;

    protected $table = 'product_in_order';

    protected $fillable = [ 'id','idOrderDetail' ,'idProductDetail','quantity'];
}
