@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Basic Information')

@section('content')
    <div>
        <create-restaurant-page-step-one v-bind:restaurant-category-tags="{{$restaurantCategoryTags}}"></create-restaurant-page-step-one>
    </div>
@endsection
