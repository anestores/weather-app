<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaceSearchController extends Controller
{
    //
    public function index() {
        $cities = explode(',', env('CITIES', ''));

        $foursquare_api_key = env('FOURSQUARE_API_KEY');

        return view('placessearch', compact(
            'cities',
            'foursquare_api_key'
        ));
    }
}
