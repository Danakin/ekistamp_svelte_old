<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\StampUser;
use App\Models\Station;
use Illuminate\Support\Str;
use Inertia\Inertia;

class StationController extends Controller
{
    public function index() : \Inertia\Response
    {
        return Inertia::render('Stations/Index', [
            'stations' => Station::query()
                ->with(['prefecture', 'city', 'lines', 'stamps'])
                ->when(request()->input('station'), function ($query, $value) {
                    $search = Str::lower($value);
                    $query->where('name', 'like', "%$search%");
                    $query->orWhere('hiragana', 'like', "%$search%");
                    $query->orWhere('romaji', 'like', "%$search%");
                })
                ->when(request()->input('prefecture'), function ($query, $value) {
                    $query->whereHas('prefecture', function ($query) use ($value) {
                        $search = Str::lower($value);
                        $query->where('name', 'like', "%$search%");
                        $query->orWhere('hiragana', 'like', "%$search%");
                        $query->orWhere('romaji', 'like', "%$search%");
                    });
                })
                ->orderBy('romaji')
                ->paginate(25)
                ->withQueryString()
            ,
            'filters' => request()->only(['station', 'prefecture']),
        ]);
    }

    public function store(StoreStationRequest $request)
    {
        //
    }

    public function show(Station $station) : \Inertia\Response
    {
        $station->load([
            'prefecture',
            'city',
            'street',
            'lines',
            'stamps',
            'lines.company',
            'lines.stations' => function ($query) {
                $query->orderByPivot('order');
            },
        ]);
        if (auth()->check()) {
            $userStamps = StampUser::query()
                ->where('user_id', auth()->id())
                ->whereIn('stamp_id', $station->stamps()->pluck('id')->toArray())
                ->get();;
        }

        return Inertia::render('Stations/Show', [
            'station' => $station,
            'userStamps' => $userStamps ?? null,
        ]);
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
