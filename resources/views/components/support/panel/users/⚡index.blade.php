<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\UserService;
use App\Models\User;
use Livewire\Attributes\Computed;
use App\Traits\Livewire\WithToast;

new class extends Component {
    use WithPagination, WithToast;

    protected UserService $service;

    public User|null $targetUser;

    public string $search = '';
    public int $perPage = 10;

    public string $noteBody = '';

    public bool $showAddNoteModal = false;
    public bool $showDeleteModal = false;
    public bool $showNotesPanel = false;

    public function boot(UserService $service)
    {
        $this->service = $service;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function openAddNoteModal(User $user)
    {
        $this->targetUser = $user;
        $this->showAddNoteModal = true;
    }

    public function addNote()
    {
        $this->validate([
            'noteBody' => 'required|string|min:10|max:300',
        ]);

        try {
            $this->service->addNoteToUser(
                createdBy: auth()->id(),
                userId: $this->targetUser->id,
                content: $this->noteBody,
            );

            $this->showAddNoteModal = false;

            $this->reset('targetUser', 'noteBody');

            $this->notify(
                type: 'success',
                title: 'Nota guardada',
                body: 'Se adjuntó la nota al jugador correctamente'
            );

        } catch (\Throwable $th) {
            $this->notify(
                type: 'danger',
                title: 'Error al guardar la nota',
                body: $th->getMessage()
            );
        }
    }

    public function openNotesPanel(User $user)
    {
        $this->targetUser = $user->load('notes.author');
        $this->showNotesPanel = true;
    }

    #[Computed]
    public function users()
    {
        return $this->service->getPaginatedUsers(
            [
                'search' => $this->search,
            ],
            $this->perPage,
        );
    }
};
?>

<div>
    <div class="flow-root px-2 mb-16">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                <x-form-input liveModel="search" placeholder="Buscar por nombre o email..." class="max-w-xs sm:w-1/2 mb-2"
                    icon="search" type="search" />

                @if ($this->users->isNotEmpty())
                    <table class="relative min-w-full divide-y divide-gray-300 mb-4">
                        <thead>
                            <tr>
                                <th scope="col"
                                class="py-3.5 pr-3 pl-4 text-left text-sm 
                                font-semibold text-gray-900 sm:pl-3">
                                    Nombre
                                </th>
                                <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold 
                                text-gray-900">
                                    Email
                                </th>
                                <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold 
                                text-gray-900 flex items-center gap-1.5">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($this->users as $user)
                                <tr wire:key='{{ $user->id }}' class="even:bg-gray-50">
                                    <td class="py-4 pr-3 pl-4 text-sm font-medium whitespace-nowrap 
                                text-gray-900 sm:pl-3">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="py-4 pr-4 pl-3 text-left text-sm font-medium whitespace-nowrap sm:pr-3">
                                        <div class="flex items-center gap-2">
                                            <x-icon code="note_add"
                                            class="p-1.5 rounded-full bg-gray-100 cursor-pointer
                                            text-gray-600 hover:bg-gray-200 hover:text-gray-900"
                                            x-tooltip.raw="Añadir nota"
                                            wire:click="openAddNoteModal({{ $user->id }})" />

                                            <x-icon code="note_stack"
                                            class="p-1.5 rounded-full bg-gray-100 cursor-pointer
                                            text-gray-600 hover:bg-gray-200 hover:text-gray-900"
                                            x-tooltip.raw="Ver notas"
                                            wire:click="openNotesPanel({{ $user->id }})" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $this->users->links() }}

                    @include('support.panel.users.partials.add-note-modal')
                    @include('support.panel.users.partials.user-notes-drawer')

                @else
                    <h4 class="mt-4 font-semibold">No se encontraron resultados</h4>
                @endif
            </div>
        </div>
    </div>
</div>
