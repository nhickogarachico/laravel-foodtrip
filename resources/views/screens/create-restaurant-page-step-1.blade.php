@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Basic Information')

@section('content')
    <div>
        <create-restaurant-page-step-one :restaurant-category-tags="{{$restaurantCategoryTags}}" :step-one-data="{{$stepOneData}}"></create-restaurant-page-step-one>
    </div>
@endsection
