<x-layout title="Séries">
    <a href="{{ route('series.create') }}"
        class="mt-5 inline-block rounded-lg bg-gray-700 px-4 py-3 text-white">Adicionar</a>
    @if (session('success'))
        <div class="my-4 rounded-lg bg-green-50 p-4 text-sm text-green-800" role="alert">
            <span class="font-medium">Success alert!</span> {{ session('success') }}
        </div>
    @endisset
    <ul
        class="list-unstyled mt-10 space-y-4 divide-y-2 rounded-sm border-2 text-left text-gray-500">
        @foreach ($series as $serie)
            <li class="flex w-full items-center justify-between space-x-3 rtl:space-x-reverse">
                <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>
                <div class="flex items-center gap-4">
                    <a class="rounded-lg bg-yellow-400 px-4 py-2 text-white"
                        href="{{ route('series.edit', $serie) }}">Editar</a>
                    <form method="post" action="{{ route('series.destroy', $serie) }}">
                        @csrf
                        @method('delete')
                        <button
                            class="rounded-lg bg-red-500 px-4 py-2 text-white">Remover</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
