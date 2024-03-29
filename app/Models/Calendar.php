<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendars';

    protected $fillable = ['id','calendar',	'phoneCustomer','created_at','updated_at','type','status','idAdmin',
    'admin_assignment',
    'idProductDetail'];
}
