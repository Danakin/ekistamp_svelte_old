<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Inertia\Inertia;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Stations/Index', [
            'stations' => Station::query()
                ->with(['prefecture', 'city', 'lines'])
                ->when(request()->input('station'), function ($query, $value) {
                    $query->where('name', 'like', "%{$value}%");
                    $query->orWhere('hiragana', 'like', "%{$value}%");
                    $query->orWhere('romaji', 'like', "%{$value}%");
                })
                ->when(request()->input('prefecture'), function ($query, $value) {
                    $query->whereHas('prefecture', function ($query) use ($value) {
                        $query->where('name', 'like', "%{$value}%");
                        $query->orWhere('hiragana', 'like', "%{$value}%");
                        $query->orWhere('romaji', 'like', "%{$value}%");
                    });
                })
                ->orderBy('romaji')
                ->paginate(25)
                ->withQueryString()
            ,
            'filters' => request()->only(['station', 'prefecture']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStationRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Station $station
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStationRequest $request
     * @param \App\Models\Station                     $station
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStationRequest $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Station $station
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}
