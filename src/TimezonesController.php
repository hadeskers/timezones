<?php

namespace Hadesker\Timezones;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

class TimezonesController extends Controller
{
    public function index($timezone=null)
    {
        $current_time = ($timezone)
            ? Carbon::now(str_replace('-', '/', $timezone))
            : Carbon::now();
        $current_time = $current_time->toDateTimeString();
        return view('timezones::index', compact('current_time'));
    }
}
