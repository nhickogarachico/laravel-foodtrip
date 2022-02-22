@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Restaurant Outlets')

@section('content')
    @if ($errors->has('stepTwoError'))
        <div class="alert alert-danger d-flex justify-content-between">
            {{$errors->first('stepTwoError')}}
            <button class="btn p-0">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
    <create-restaurant-page-step-two :step-one-data="{{ $stepOneData }}" :step-two-data="{{ $stepTwoData }}"
        :areas="{{ $areas }}" :localities="{{ $localities }}" :locations="{{ $locations }}">
    </create-restaurant-page-step-two>
    {{-- Add outlet modal --}}
    <add-restaurant-outlet-modal :areas="{{ $areas }}" :localities="{{ $localities }}"
        :locations="{{ $locations }}" :step-one-data="{{ $stepOneData }}"></add-restaurant-outlet-modal>
@endsection
