<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Calendar as ModelsCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Calendar extends Controller
{
    public function index()
    {
        //$calendar = ModelsCalendar::all();
        $calendar1 = DB::table('calendars')
        ->join('admin', 'calendars.idAdmin', '=', 'admin.id')
        ->join('customer', 'calendars.phoneCustomer', '=', 'customer.phone')
        ->select(['calendars.id as id', 'calendar' , 'phoneCustomer', 
                  'customer.name as nameCustomer','customer.email','customer.dob','customer.address','type','admin.name as nameAdmin'])
        ->get();

        $calendar2 = DB::table('calendars')
        ->join('customer', 'calendars.phoneCustomer', '=', 'customer.phone')
        ->where('idAdmin','=',null)
        ->select(['calendars.id as id', 'calendar' , 'phoneCustomer', 
                  'customer.name as nameCustomer','customer.email','customer.dob','customer.address','type'])
        ->get();

        $calendar = Arr::collapse([$calendar1, $calendar2]);
        // dd($calendar);
        return View('pages.calendar.calendar',['calendar'=>$calendar]);
    }

    public function phanCong($id,$type)
    {
        $t = 0;
        if($type == 1){
            $t = 1;
        }else{
            $t = 2;
        }
        $admin = Admin::where([['status','=',0],['role','=',0],['position','=',$t]])->get();
        return View('pages.calendar.phanCong',['id'=>$id,'admin'=>$admin]);
    }

    public function update(Request $request,$id)
    {
        $calendar = ModelsCalendar::find($id);

        $calendar->calendar = $calendar->calendar;
        $calendar->phoneCustomer = $calendar->phoneCustomer;
        $calendar->type = $calendar->type;
        $calendar->idAdmin = $request->input('idAdmin');
        // dd($request->input('idAdmin'));
        $calendar->save();
        return redirect('/calendar');
    
    }
}
