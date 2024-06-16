<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'success' => session('success')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;

        $season->episodes()->whereNotIn('id', $watchedEpisodes)->update(['watched' => false]);

        $season->episodes()->whereIn('id', $watchedEpisodes)->update(['watched' => true]);

        return redirect()->back()->with('success', 'Episodes marked as watched/unwatched');
    }
}
