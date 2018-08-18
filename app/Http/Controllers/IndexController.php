<?php

namespace App\Http\Controllers;

use App\Property;
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

        $properties = Property::whereHas('location', function($query) use ($request) {
            $query->where('location_name', 'like', '%' . $request->get('search') . '%');

            $query->where('near_beach', $request->get('near_the_beach')? 1 : 0);
            $query->where('accepts_pets', $request->get('accepts_pets')? 1 : 0);

            if($request->get('sleeps')) {
                $query->where('sleeps', '>', $request->get('sleeps'));
            }

            if($request->get('beds')) {
                $query->where('beds', '>', $request->get('beds'));
            }

            if($request->get('availability')) {
                // not sure how should I get that
            }
        })->paginate(10)->appends($request->all());

        return view('results', ['properties' => $properties]);
    }
}
