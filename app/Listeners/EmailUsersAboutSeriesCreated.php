<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\SeriesCreated;
use App\Events\SeriesCreated as SeriesCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUsersAboutSeriesCreated implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(SeriesCreatedEvent $event): void
    {
        $userList = User::all();

        foreach ($userList as $index => $user) {

            $mail = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason,
            );

            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $mail);
        }
    }
}
