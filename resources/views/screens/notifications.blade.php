@extends('layouts.main')

@section('title', 'Notifications')

@section('content')
    
    <notifications-list v-bind:user="{{Auth::user()}}"/>
@endsection