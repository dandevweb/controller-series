<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Series;
use App\Events\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository) {}

    public function index()
    {
        $series = Series::with('seasons')->get();

        $success = session('success');
        return view('series.index', compact('series', 'success'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $series = $this->repository->add($request);

        SeriesCreated::dispatch(
            $series->name,
            $series->id,
            $request->seasons,
            $request->episodes,
        );

        return redirect()->route('series.index')
            ->with('success', "Série '{$series?->name}' criada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->update($request->validated());

        return redirect()->route('series.index')
            ->with('success', "Série '{$series->name}' atualizada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $name = $series->name;
        $series->delete();

        return redirect()->route('series.index')
            ->with('success', "Série {$name} removida com sucesso!");
    }
}
