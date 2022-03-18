<?php

namespace App\Http\Controllers;

use App\Models\Calendar as ModelsCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Calendar extends Controller
{
    public function index()
    {
        //$calendar = ModelsCalendar::all();
        $calendar = DB::table('calendars')
        ->join('customer', 'calendars.phoneCustomer', '=', 'customer.phone')
        ->select(['calendars.id as id', 'calendar' , 'phoneCustomer', 
                  'customer.name as nameCustomer','email','dob','address'])
        ->get();
        return View('pages.calendar.calendar',['calendar'=>$calendar]);
    }
}
