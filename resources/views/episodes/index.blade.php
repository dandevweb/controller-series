<x-layout title="Episódios" :$success>
    <form method="post">
        @csrf
        <ul
            class="list-unstyled mt-10 space-y-4 divide-y-2 rounded-sm border-2 text-left text-gray-500">
            @foreach ($episodes as $episode)
                <li class="flex w-full items-center justify-between space-x-3 rtl:space-x-reverse">

                    Episódio: {{ $episode->number }}

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                        @checked($episode->watched)>
                </li>
            @endforeach
        </ul>

        <button
            class="mt-5 flex justify-end rounded-lg bg-gray-700 px-4 py-2 text-white">Salvar</button>
    </form>
</x-layout>
