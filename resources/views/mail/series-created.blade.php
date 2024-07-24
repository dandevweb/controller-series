@component('mail::message')
# {{ $seriesName }} criada com sucesso!

A série {{ $seriesName }} com {{ $seasonsCount }} temporadas e {{ $episodesCount }} episódios foi
    criada com sucesso!

Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $seriesId)])
Acessar série
@endcomponent
@endcomponent
