<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\DestroyStepTwoRequest;
use App\Http\Requests\Restaurant\EditStepTwoRequest;
use App\Http\Requests\Restaurant\StoreRestaurantOutletRequest;
use App\Models\RestaurantCategory;
use App\Http\Requests\Restaurant\StoreStepOneRequest;
use App\Http\Requests\Restaurant\StoreStepTwoRequest;
use App\Models\Area;
use App\Models\Locality;
use App\Models\Location;
use App\Models\MenuItemCategory;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $restaurantCategory;
    protected $menuItemCategory;
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

    protected $initialStepThree = [
        'menuItems' => []
    ];
    public function __construct(RestaurantCategory $restaurantCategory, Area $area, Locality $locality, Location $location, MenuItemCategory $menuItemCategory)
    {
        $this->restaurantCategory = $restaurantCategory;
        $this->area = $area;
        $this->locality = $locality;
        $this->location = $location;
        $this->menuItemCategory = $menuItemCategory;
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
            // Initialize session data first if there's none
            if (!session('stepTwoData')) {
                session()->put('stepTwoData.restaurantOutlets', []);
            }
            return view('screens.create-restaurant-page-step-2', [
                'areas' => $areas,
                'localities' => $localities,
                'locations' => $locations,
                'stepOneData' => json_encode($stepOneData),
                'stepTwoData' => json_encode(session('stepTwoData'))
            ]);
        } else {
            return redirect('/register');
        }
    }

    public function showRegisterRestaurantStepThreeView()
    {
        if (session('stepTwoData') && count(session('stepTwoData.restaurantOutlets')) > 0) {
            return view('screens.create-restaurant-page-step-3', [
                'menuItemCategories' => $this->menuItemCategory->orderBy('category')->get(),
                'stepThreeData' => session('stepThreeData') ? json_encode(session('stepThreeData')) : json_encode($this->initialStepThree)
            ]);
        } else if (session('stepTwoData') && count(session('stepTwoData.restaurantOutlets')) === 0) {
            return back()->withErrors([
                'stepTwoError' => 'There are no restaurant outlets yet.'
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

    public function updateRestaurantOutletDataSession(EditStepTwoRequest $request)
    {
        $restaurantOutletId = $request->validated()['restaurantOutletId'];
        session()->put("stepTwoData.restaurantOutlets.$restaurantOutletId", $request->validated());
    }

    public function deleteRestaurantOutletSession($restaurantOutletIndex)
    {
        $restaurantOutlets = session()->get("stepTwoData.restaurantOutlets");
        array_splice($restaurantOutlets, $restaurantOutletIndex, 1);
        session()->put("stepTwoData.restaurantOutlets",$restaurantOutlets );

    }
}
