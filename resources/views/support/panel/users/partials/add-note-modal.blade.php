<x-modal wire:model="showAddNoteModal" title="Agregar nota de jugador" closeOnClickAway>

    <p class="text-sm text-gray-700 mb-4">
        Estas a punto de agregar una nota de jugador a {{ $targetUser?->name }}
    </p>

    <div>
        <label for="note_content" class="block text-sm/6 font-medium text-gray-900">
            Nota
        </label>
        <div class="mt-2">
            <textarea wire:model.blur='noteBody' id="note_content" name="note_content" rows="4"
            placeholder="Escribe tus observaciones aquí"
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base 
            text-gray-900 outline-1 -outline-offset-1 outline-gray-300 
            placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
            focus:outline-indigo-600 sm:text-sm/6"></textarea>
        </div>

        @error('noteBody')
            <small class="text-sm text-red-500">
                {{ $message }}
            </small>
        @else
            <small class="text-sm text-gray-600">
                Máximo 300 caracteres.
            </small>
        @enderror
    </div>

    <x-slot name="actions">
        <x-button wire:loading.remove wire:target='addNote' size="large" type="secondary"
            wire:click="$set('showAddNoteModal', false)">
            Cancelar
        </x-button>

        <x-button size="large" wire:click="addNote" wire:loading.remove wire:target='addNote'>
            Confirmar
        </x-button>

        <div wire:loading wire:target='addNote'>
            <div class="flex items-center gap-2">
                <x-spinner />
                <span>Agregando nota...</span>
            </div>
        </div>
    </x-slot>

</x-modal>
