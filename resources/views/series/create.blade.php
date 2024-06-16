<x-layout title="Criar Série">
    <form method="post" action="{{ route('series.store') }}">
        @csrf
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-8">
                <label for="name">Nome da Série:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    autofocus class="w-full rounded-lg">
                @if ($errors->has('name'))
                    <div class="text-xs italic text-red-500">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="col-span-2">
                <label for="seasons">N Temporadas:</label>
                <input type="text" name="seasons" id="seasons" value="{{ old('seasons') }}"
                    class="rounded-lg">
                @if ($errors->has('seasons'))
                    <div class="text-xs italic text-red-500">{{ $errors->first('seasons') }}</div>
                @endif
            </div>
            <div class="col-span-2">
                <label for="episodes">Eps/ Temporada:</label>
                <input type="text" name="episodes" id="episodes" value="{{ old('episodes') }}"
                    class="rounded-lg">
                @if ($errors->has('episodes'))
                    <div class="text-xs italic text-red-500">{{ $errors->first('episodes') }}</div>
                @endif
            </div>
        </div>
        <button
            class="mt-5 flex justify-end rounded-lg bg-gray-700 px-4 py-2 text-white">Salvar</button>
    </form>
</x-layout>
