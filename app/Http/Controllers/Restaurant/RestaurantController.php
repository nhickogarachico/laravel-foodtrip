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

    public function showRegisterRestaurantView(int $stepNumber)
    {
        $restaurantCategoryTags = $this->restaurantCategory->orderBy('category')->get();

        if($stepNumber > 0 && $stepNumber < 5) {
            return view("screens.create-restaurant-page-step-$stepNumber", [
                'restaurantCategoryTags' => $restaurantCategoryTags
            ]);
        } else {
            abort(404);
        }
    }

    public function completeRestaurantPageCreationStepOne(StoreStepOneRequest $request)
    {
        $request->session()->put('stepOneData' , $request->validated());
    }
}
