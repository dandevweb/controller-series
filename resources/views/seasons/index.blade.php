<x-layout title="Temporadas de {!! $series->name !!}">
    <ul class="list-unstyled mt-10 space-y-4 divide-y-2 rounded-sm border-2 text-left text-gray-500">
        @foreach ($seasons as $season)
            <li class="flex w-full items-center justify-between space-x-3 rtl:space-x-reverse">
                <a class="text-blue-600 !underline" href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <div class="items flex">
                    {{ $season->numberOfWatchedEpisodes() }} /
                    {{ $season->episodes->count() }}
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
