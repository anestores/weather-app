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
        return view('home');
    }
    public function getWeatherData() {
        $cities = explode(',', env('CITIES', ''));

        $weather = new OpenWeather();

        $data = [];

        foreach($cities as $city) {
            $current = $weather->getCurrentWeatherByCityName($city, 'metric');
//            $forecast = $weather->getForecastWeatherByCityName($city, 'metric');
            $data[] = [
                'current' => $current,
//                'forecast' => $forecast
            ];
        }
        return response()->json(['data' => $data],
            200);
    }
    public function getWeatherForecast($city) {
        $cities = explode(',', env('CITIES', ''));

        $cityName = $cities[$city];

        $data = [];
        $weather = new OpenWeather();
        $forecast = $weather->getForecastWeatherByCityName($cityName, 'metric');
        $data[] = ['forecast' => $forecast];

        return view('weatherforecastbycity', compact('cityName', 'data'));
    }
}
