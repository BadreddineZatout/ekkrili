@extends('layout')

@section('content')
    <x-search-section :categories="$categories" />
    <x-premium-ads :ads="$premium_ads" />
    <x-last-sales-ads :ads="$last_sales" />
    <x-last-renting-ads :ads="$last_rentals" />
@endsection
