@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Basic Information')

@section('content')
    @if (session()->has('stepOneData'))
        {{session('stepOneData')['restaurantName']}}
    @else
        
    @endif
@endsection
