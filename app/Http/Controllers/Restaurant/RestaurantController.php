<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCategory;
use App\Http\Requests\Restaurant\StoreStepOneRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $restaurantCategory;

    public function __construct(RestaurantCategory $restaurantCategory)
    {
        $this->restaurantCategory = $restaurantCategory;
    }

    public function showRegisterRestaurantStepOneView(Request $request)
    {   
        // Reset session data first 
        $request->session()->forget('stepOneData');
        $restaurantCategoryTags = $this->restaurantCategory->orderBy('category')->get();
        return view("screens.create-restaurant-page-step-1", [
            'restaurantCategoryTags' => $restaurantCategoryTags
        ]);
    }
    public function showRegisterRestaurantStepTwoView()
    {
            return view('screens.create-restaurant-page-step-2');
    }
    public function completeRestaurantPageCreationStepOne(StoreStepOneRequest $request)
    {
        $request->session()->put('stepOneData', $request->validated());
    }
}
