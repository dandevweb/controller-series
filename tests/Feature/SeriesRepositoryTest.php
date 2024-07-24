<?php
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;

test('when a series is created its seasons and episodes must also be created', function () {
    $repository = $this->app->make(SeriesRepository::class);
    $request = new SeriesFormRequest();
    $request->name = 'Breaking Bad';
    $request->seasons = 5;
    $request->episodes = 10;

    $repository->add($request);

    $this->assertDatabaseHas('series', ['name' => 'Breaking Bad']);
    $this->assertDatabaseHas('seasons', ['number' => 5]);
    $this->assertDatabaseHas('episodes', ['number' => 10]);
    $this->assertDatabaseCount('seasons', 5);
    $this->assertDatabaseCount('episodes', 50);
});
