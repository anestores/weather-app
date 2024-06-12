@extends('layout')

@section('title', 'Weather')

@section('content')
    <div id="app">
        <home-component :data="{{ json_encode($data) }}"
                        :today-in-words="{{ json_encode($todayInWords) }}"
        ></home-component>
    </div>
@endsection

@push('scripts')
@endpush