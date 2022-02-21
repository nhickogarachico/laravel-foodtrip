<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\EditStepTwoRequest;
use App\Http\Requests\Restaurant\StoreRestaurantOutletRequest;
use App\Models\RestaurantCategory;
use App\Http\Requests\Restaurant\StoreStepOneRequest;
use App\Http\Requests\Restaurant\StoreStepTwoRequest;
use App\Models\Area;
use App\Models\Locality;
use App\Models\Location;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $restaurantCategory;
    protected $area;
    protected $locality;
    protected $location;
    protected $initialStepOne = [
        "restaurantName" => "",
        "mobileNumbers" => [],
        "telephoneNumbers" => [],
        "websiteName" => "",
        "restaurantCategories" => []
    ];
    protected $initialStepTwo = [
        "restaurantOutlets" => []
    ];
    public function __construct(RestaurantCategory $restaurantCategory, Area $area, Locality $locality, Location $location)
    {
        $this->restaurantCategory = $restaurantCategory;
        $this->area = $area;
        $this->locality = $locality;
        $this->location = $location;
    }

    public function showRegisterRestaurantStepOneView()
    {

        $restaurantCategoryTags = $this->restaurantCategory->orderBy('category')->get();
        return view("screens.create-restaurant-page-step-1", [
            'restaurantCategoryTags' => $restaurantCategoryTags,
            'stepOneData' => session('stepOneData') ? json_encode(session('stepOneData')) : json_encode($this->initialStepOne),
        ]);
    }
    public function showRegisterRestaurantStepTwoView()
    {

        $stepOneData = session('stepOneData');
        $areas = $this->area->all();
        $localities = $this->locality->all();
        $locations = $this->location->all();

        if (session('stepOneData')) {
            return view('screens.create-restaurant-page-step-2', [
                'areas' => $areas,
                'localities' => $localities,
                'locations' => $locations,
                'stepOneData' => json_encode($stepOneData),
                'stepTwoData' => session('stepTwoData') ? json_encode(session('stepTwoData')) : json_encode($this->initialStepTwo)
            ]);
        } else {
            return redirect('/register');
        }
    }
    public function completeRestaurantPageCreationStepOne(StoreStepOneRequest $request)
    {
        $request->session()->put('stepOneData', $request->validated());
    }

    public function completeRestaurantPageCreationStepTwo(StoreStepTwoRequest $request)
    {
        $request->session()->push('stepTwoData.restaurantOutlets', $request->validated());
    }

    public function fetchSessionData()
    {
        return response()->json([
            'sessionData' => session()->all()
        ]);
    }

    public function updateRestaurantOutletData(EditStepTwoRequest $request)
    {
        $restaurantOutletId = $request->validated()['restaurantOutletId'];
        $restaurantOutlets = session("stepTwoData");
        $restaurantOutlets['restaurantOutlets'][$restaurantOutletId]['restaurantOutletName'] = $request->validated()['restaurantOutletName'];
        session()->put('stepTwoData', $restaurantOutlets);
        return response()->json([
            'restaurantOutlet' => session('stepTwoData')
        ]);
    }   
}
