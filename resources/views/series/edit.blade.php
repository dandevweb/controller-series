<x-layout title="Editar Série">
    <form method="post" action="{{ route('series.update', $series) }}">
        @csrf
        @isset($series)
            @method('put')
        @endisset
        <div class="flex flex-col">
            <label for="name">Nome da Série:</label>
            <input type="text" name="name" id="name"
                value="{{ old('name', $series->name ?? '') }}" class="max-w-2xl rounded-lg">
            @if ($errors->has('name'))
                <div class="text-xs italic text-red-500">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="col-span-2">
            <label for="seasons">N Temporadas:</label>
            <input type="text" name="seasons" id="seasons"
                value="{{ old('seasons', $series->seasons->count()) }}" class="rounded-lg">
            @if ($errors->has('seasons'))
                <div class="text-xs italic text-red-500">{{ $errors->first('seasons') }}</div>
            @endif
        </div>
        <div class="col-span-2">
            <label for="seasons">Eps/ Temporada:</label>
            <input type="text" name="epidodes" id="seasons"
                value="{{ old('seasons', $series->seasons->first()->episodes->count()) }}"
                class="rounded-lg">
            @if ($errors->has('seasons'))
                <div class="text-xs italic text-red-500">{{ $errors->first('seasons') }}</div>
            @endif
        </div>
        <button
            class="mt-5 flex justify-end rounded-lg bg-gray-700 px-4 py-2 text-white">Salvar</button>
    </form>
</x-layout>
