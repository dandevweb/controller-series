<x-app-layout header="Séries" :$success>
    <a href="{{ route('series.create') }}"
        class="inline-block px-4 py-3 mt-5 text-white bg-gray-700 rounded-lg">Adicionar</a>

    <ul class="mt-10 space-y-4 text-left text-gray-500 border-2 divide-y-2 rounded-sm list-unstyled">
        @foreach ($series as $serie)
            <li class="flex items-center justify-between w-full space-x-3 rtl:space-x-reverse">
                <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>
                <div class="flex items-center gap-4">
                    <a class="px-4 py-2 text-white bg-yellow-400 rounded-lg"
                        href="{{ route('series.edit', $serie) }}">Editar</a>
                    <form method="post" action="{{ route('series.destroy', $serie) }}">
                        @csrf
                        @method('delete')
                        <button class="px-4 py-2 text-white bg-red-500 rounded-lg">Remover</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-app-layout>
