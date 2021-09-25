<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Speaker;
use App\Schedule;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Price;
use App\Amenity;

class HomeController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
        $venues = Venue::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();

        return view('home', compact('speakers', 'schedules', 'venues', 'galleries', 'sponsors', 'prices', 'amenities'));
    }

    public function view(Speaker $speaker)
    {
        return view('speaker', compact('speaker'));
    }
}
