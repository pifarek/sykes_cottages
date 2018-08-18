<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function results(Request $request) {

        $request->validate([
            'search' => ['min:3', 'required'],
        ]);

        $locations = Location::where('location_name', 'like', '%' . $request->get('search') . '%')->get();

        $propertiesCollection = collect();
        foreach($locations as $location) {
            $propertiesQuery = $location->properties();

            $propertiesQuery->where('near_beach', $request->get('near_the_beach')? 1 : 0);
            $propertiesQuery->where('accepts_pets', $request->get('accepts_pets')? 1 : 0);

            if($request->get('sleeps')) {
                $propertiesQuery->where('sleeps', '>', $request->get('sleeps'));
            }

            if($request->get('beds')) {
                $propertiesQuery->where('beds', '>', $request->get('beds'));
            }

            if($request->get('availability')) {
                // not sure how should I get that
            }

            $properties = $propertiesQuery->get();

            foreach ($properties as $property) {
                $propertiesCollection->push($property);
            }
        }

        return view('results', ['properties' => $propertiesCollection]);
    }
}
