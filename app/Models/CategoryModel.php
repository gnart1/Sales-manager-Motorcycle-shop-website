<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $fillable = [ 
        'id',
        'name',
        'description',
        'type',
        'created_at',
        'updated_at'];
}
