@extends('layout')

@section('content')
    <x-search-section />
    <x-premium-ads :ads="$premium_ads" />
    <x-last-sales-ads />
    <x-last-renting-ads />
@endsection
