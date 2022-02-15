<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'admin';

    protected $fillable = [ 'id', 'name', 'password', 'phone', 'address', 'email', 'position', 'role'];

    protected $hidden = ['password'];

}
