<form method="post"
    action="{{ isset($series) ? route('series.update', $series) : route('series.store') }}">
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
    <button
        class="mt-5 flex justify-end rounded-lg bg-gray-700 px-4 py-2 text-white">Salvar</button>
</form>
