<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Prefecture;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $prefectures = Prefecture::all();
        $cities = City::select('id', 'name')
            ->when($request->input('prefecture'), function ($query, $prefecture) {
                $query->where('prefecture_id', $prefecture);
            })
            ->when(!$request->input('prefecture'), function ($query) {
                $query->limit(0);
            })
            ->get();
        $stations = Collection::make([]);
        $companies = Collection::make([]);
        $lines = Collection::make([]);
        return Inertia::render('Search/Search', [
            'prefectures' => $prefectures,
            'cities' => $cities,
            'filters' => $request->only(['prefecture', 'city'])
        ]);
    }
}
