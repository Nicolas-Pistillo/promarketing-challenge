<x-drawer wire:model="showNotesPanel" title="Notas de {{ $targetUser?->name }}">

    @if ($targetUser?->notes->isNotEmpty())
        <ul class="divide-y divide-gray-200">
            @foreach ($targetUser->notes as $note)
                <li class="py-4">
                    <p class="text-sm text-gray-700">
                        {{ $note->content }}
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        Creada por {{ $note->author->name }} el
                        {{ $note->created_at->format('d M Y, H:i') }}
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <h4 class="mt-4 font-semibold text-gray-500">
            No se encontraron notas para este usuario
        </h4>
    @endif

</x-drawer>
