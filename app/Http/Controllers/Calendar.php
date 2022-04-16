<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Calendar as ModelsCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
class Calendar extends Controller
{
    public function index()
    {
        //$calendar = ModelsCalendar::all();
        $calendar1 = DB::table('calendars')
            ->join('admin', 'calendars.idAdmin', '=', 'admin.id')
            ->join('customer', 'calendars.phoneCustomer', '=', 'customer.phone')
            ->where('idProductDetail', '=', null)
            ->select([
                'calendars.id as id', 'calendars.idAdmin', 'calendar', 'phoneCustomer', 'calendars.admin_assignment',
                'customer.name as nameCustomer', 'customer.email', 'customer.dob', 'customer.address', 'calendars.type', 'admin.name as nameAdmin', 'calendars.status'
            ])
            ->get();

        $calendar2 = DB::table('calendars')
            ->join('customer', 'calendars.phoneCustomer', '=', 'customer.phone')
            ->where('idAdmin', '=', null)
            ->where('idProductDetail', '=', null)
            ->select([
                'calendars.id as id', 'calendars.idAdmin', 'calendar', 'phoneCustomer',
                'customer.name as nameCustomer', 'customer.email', 'customer.dob', 'customer.address', 'calendars.type', 'calendars.status'
            ])
            ->get();
        $calendar4 = DB::table('calendars')
            ->join('customer', 'calendars.phoneCustomer', '=', 'customer.phone')
            ->join('admin', 'calendars.idAdmin', '=', 'admin.id')
            ->join('productdetail', 'calendars.idProductDetail', '=', 'productdetail.id')
            ->join('product', 'productdetail.idProduct', '=', 'product.id')
            ->select([
                'calendars.id as id', 'calendars.idAdmin', 'product.name as nameProduct', 'calendar', 'phoneCustomer', 'calendars.admin_assignment',
                'customer.name as nameCustomer', 'customer.email', 'customer.dob', 'customer.address','admin.name as nameAdmin', 'calendars.type', 'calendars.status'
            ])
            ->get();

        $calendar = Arr::collapse([$calendar1, $calendar2, $calendar4]);
        $admin_assignment = [];
        foreach ($calendar as $key => $value) {
            if (isset($value->admin_assignment)) {
                $admin_assignment = DB::table('admin')
                    ->where('id', $value->admin_assignment)
                    ->select(['name'])
                    ->first();
                    // dd($admin_assignment);
                $calendar[$key]->admin_assignment = $admin_assignment->name;
            }
        }
        // dd($calendar2);
        return View('pages.calendar.calendar', ['calendar' => $calendar]);
    }

    public function phanCong($id, $type)
    {
        $t = 0;
        if ($type == 1) {
            $t = 1;
        } else {
            $t = 2;
        }
        $admin = Admin::where([['status', '=', 0], ['role', '=', 2], ['position', '=', $t]])->get();
        return View('pages.calendar.phanCong', ['id' => $id, 'admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $calendar = ModelsCalendar::find($id);

        $calendar->calendar = $calendar->calendar;
        $calendar->phoneCustomer = $calendar->phoneCustomer;
        $calendar->type = $calendar->type;
        $calendar->status = 0;
        $calendar->idAdmin = $request->input('idAdmin');
        $calendar->admin_assignment = Auth::guard('admin')->user()->id;
        // dd($request->input('idAdmin'));
        $calendar->save();

        $admin = Admin::find($request->input('idAdmin'));
        $admin->status = 1;
        $admin->save();

        return redirect('/calendar');
    }
    public function updateStatus(Request $request, $id)
    {
        $calendar = ModelsCalendar::find($id);
        $calendar->status = 1;
        $calendar->save();
        // dd($request->input('idAdmin'));

        $admin = Admin::find($request->input('idAdmin'));
        $admin->status = 0;
        $admin->save();
        return redirect('/calendar');
    }
    public function updateCancel(Request $request, $id)
    {
        $calendar = ModelsCalendar::find($id);
        $calendar->status = 2;
        $calendar->save();
 
        return redirect('/calendar');
    }
}
