@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Menu Items')

@section('content')
   <create-restaurant-page-step-three :step-three-data="{{$stepThreeData}}" :menu-item-category-tags="{{$menuItemCategories}}"></create-restaurant-page-step-three>
@endsection
