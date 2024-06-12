<?php

namespace App\Http\Controllers;

use Dnsimmons\OpenWeather\OpenWeather;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    //
    public function index()
    {
        $todayInWords = Carbon::now('GMT+9')->isoFormat('dddd, MMMM D YYYY h:mmA');

        $cities = explode(',', env('CITIES', ''));

        $weather = new OpenWeather();

        $data = [];

        foreach($cities as $city) {
            $current = $weather->getCurrentWeatherByCityName($city, 'metric');
            $forecast = $weather->getForecastWeatherByCityName($city, 'metric');
            $data[] = [
                'current' => $current,
                'forecast' => $forecast
            ];
        }

        return view('home', compact('data', 'todayInWords'));
    }
}
