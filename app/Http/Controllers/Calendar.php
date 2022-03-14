<?php

namespace App\Http\Controllers;

use App\Models\Calendar as ModelsCalendar;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function index()
    {
        $calendar = ModelsCalendar::all();

        return View('pages.calendar.calendar',['calendar'=>$calendar]);
    }
}
