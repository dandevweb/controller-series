<?php

namespace App\Http\Controllers\Api;

use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Events\SeriesCreated;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository) {}

    public function index(): LengthAwarePaginator
    {
        return Series::paginate();
    }

    public function show(Series $series): Series
    {
        return $series;
    }

    public function store(SeriesFormRequest $request): JsonResponse
    {
        $coverPath = $request->hasFile('cover') ? $request->file('cover')->store('series_cover', 'public') : null;
        $request->coverPath = $coverPath;

        $series = $this->repository->add($request);

        SeriesCreated::dispatch(
            $series->name,
            $series->id,
            $request->seasons,
            $request->episodes,
        );

        return response()->json(status: Response::HTTP_CREATED);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->update($request->validated());

        return response()->json(status: Response::HTTP_OK);
    }

    public function destroy(Series $series, Authenticatable $user): JsonResponse
    {
        if (!$user->tokenCan('series:delete')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $series->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }

    public function seasons(Series $series): Collection
    {
        return $series->seasons;
    }

    public function episodes(Series $series): Collection
    {
        return $series->episodes;
    }

    public function watched(Request $request, Episode $episode): JsonResponse
    {
        $episode->watched = $request->watched;
        $episode->save();

        return response()->json(status: Response::HTTP_OK);
    }

}