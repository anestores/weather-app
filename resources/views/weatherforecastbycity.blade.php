@extends('layout')

@section('title', 'Weather App')

@section('content')
    <div id="app">
        <weather-forecast-by-city-component :city-name="{{ json_encode($cityName) }}"
                                            :data="{{ json_encode($data) }}"
        ></weather-forecast-by-city-component>
    </div>
@endsection

@push('scripts')
@endpush
