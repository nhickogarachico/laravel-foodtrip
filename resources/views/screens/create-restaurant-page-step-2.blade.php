@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Restaurant Outlets')

@section('content')
   <create-restaurant-page-step-two></create-restaurant-page-step-two>
   {{-- Add outlet modal --}}
   <add-restaurant-outlet-modal :areas="{{$areas}}" :localities="{{$localities}}" :locations="{{$locations}}" :step-one-data="{{$stepOneData}}"></add-restaurant-outlet-modal >
@endsection
