@extends('layouts.create-restaurant-page')

@section('title', 'FoodTrip | Create Restaurant Page - Basic Information')

@section('content')
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form action="/register/restaurant/step/1" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" name="restaurantName" id="floatingRestaurantName" type="text"
                    placeholder="restaurant name" autofocus value={{ session('stepOneData') ? session('stepOneData')['restaurantName'] : ""}} >
                <label for="floatingName">Restaurant Name</label>
            </div>
            <p class="fw-600">Contact Information</p>
            <div>
                <div class="contact-container d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center flex-fill">
                        <div class="contact-icon">
                            <i class="fas fa-mobile-alt me-3"></i>
                        </div>
                        <p class="mb-0 fw-600 me-2">+63</p>
                        <div class="form-floating w-100">
                            <input class="form-control" name="mobileNumber" id="floatingMobile1" type="text"
                                placeholder="mobile number 1" maxlength="10">
                            <label for="floatingMobile1">Mobile Number</label>
                        </div>
                    </div>
                    <button id="addMobileBtn" type="button" class="btn btn-main-red ms-2 add-contact-btn">Add Mobile Number
                        +</button>

                </div>
                <div class="text-center mobile-numbers-div">
                </div>
            </div>
            <div>
                <div class="contact-container d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center flex-fill">
                        <div class="contact-icon">
                            <i class="fas fa-phone me-3"></i>
                        </div>
                        <p class="mb-0 fw-600 me-2">+63</p>
                        <div class="form-floating w-100">
                            <input class="form-control" name="telephoneNumber" id="floatingTelephone1" type="text"
                                placeholder="telephone number 1" maxlength="9">
                            <label for="floatingTelephone1">Telephone Number</label>
                        </div>
                    </div>
                    <button id="addTelephoneBtn" type="button" class="btn btn-main-red ms-2 add-contact-btn">Add Telephone
                        Number +</button>
                </div>
                <div class="text-center telephone-numbers-div"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center">

                <div class="contact-icon">
                    <i class="fas fa-globe me-3"></i>
                </div>
                <p class="mb-0 fw-600 me-1 fs-9">www.</p>
                <div class="form-floating mb-3 w-100">
                    <input class="form-control" name="website" id="floatingWebsite" type="text" placeholder="website">
                    <label for="floatingWebsite">Website</label>
                </div>

            </div>
            <p class="fw-600">Categories</p>
            <div class="tags-container mb-3">
                <div class="tag-input">
                    <input class="form-control tag-text" type="text" placeholder="categories">
                </div>
                <div class="tag-dropdown">
                </div>
                <div class="tag-categories mt-3">

                </div>
            </div>
            <button type="submit" class="btn btn-main-red w-100">Next</button>
        </form>

    </div>

    @push('scripts')
    <script src="{{ asset('js/create-restaurant-page.js') }}"></script>
    @endpush
@endsection
