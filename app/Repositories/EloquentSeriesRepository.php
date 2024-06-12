<?php

namespace App\Repositories;

use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request) {

            $series = Series::create($request->validated());
            $seasons = [];
            for($i = 1; $i <= $request->seasons; $i++) {
            $seasons[] = [
                    'number' => $i,
                    'series_id' => $series->id
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach($series->seasons as $season) {
                for($i = 1; $i <= $request->episodes; $i++) {
                    $episodes[] = [
                        'number' => $i,
                        'season_id' => $season->id
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;

        });

    }

}
