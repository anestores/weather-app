@extends('layout')

@section('title', 'Places Search')

@section('content')
    <div id="app">
        <placesearch-component :cities="{{ json_encode($cities) }}"
                               :foursquare_api_key="{{ json_encode($foursquare_api_key) }}"
        ></placesearch-component>
    </div>
@endsection

@push('scripts')
@endpush