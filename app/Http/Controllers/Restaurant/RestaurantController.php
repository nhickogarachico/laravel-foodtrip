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
        $restaurantCategory = $this->restaurantCategory->all();

        if($stepNumber > 0 && $stepNumber < 5) {
            return view("screens.create-restaurant-page-step-$stepNumber", [
                'restaurantCategory' => $restaurantCategory
            ]);
        } else {
            abort(404);
        }
    }

    public function completeRestaurantPageCreationStepOne(StoreStepOneRequest $request)
    {
        $request->session()->put('stepOneData', $request->validated());

        return redirect('/register/restaurant/step/2');
    }
}
