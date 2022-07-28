@extends('layouts.main', ['title' => "Widget Pack Calculator"])

@section('content')

    <widget-pack-calculator widget-data-url="{{ route('widget-caluclator') }}">
    </widget-pack-calculator>

@endsection