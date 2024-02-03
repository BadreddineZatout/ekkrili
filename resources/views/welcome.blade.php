@extends('layout')

@section('content')
    <x-search-section />
    <x-premium-ads :ads="$premium_ads" />
    <x-last-sales-ads :ads="$last_sales" />
    <x-last-renting-ads />
@endsection
