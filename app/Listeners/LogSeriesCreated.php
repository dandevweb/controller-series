<?php

namespace App\Listeners;

use App\Events\SeriesCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSeriesCreated implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SeriesCreated $event): void
    {
        Log::info("Série {$event->seriesName} criada com sucesso!");
    }
}
