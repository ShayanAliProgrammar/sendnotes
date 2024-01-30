<?php

use Livewire\Volt\Component;
use App\Models\Note;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public function delete($id)
    {
        $note = Note::where('id', $id)->first();

        $this->authorize('delete', $note);

        $note->delete();

        return $this->render();
    }

    public function with()
    {
        return [
            'notes' => auth()
                ->user()
                ->notes()
                ->orderBy('send_date', 'asc')
                ->paginate(10),
        ];
    }

    public function placeholder()
    {
        return view('components.loadings.show-notes');
    }
}; ?>

<div>
    <div class="grid md:grid-cols-2 gap-3">
        @if ($notes->isEmpty())
            <p>Your notes will appear here.</p>
        @endif

        @php
            $i = 0;
        @endphp

        @foreach ($notes as $note)
            @php
                $i++;
            @endphp
            <x-card :wire:key="$note->id">
                <div class="flex justify-between">
                    <a href="{{ route('edit-note', $note) }}" wire:navigate
                        class="hover:underline text-sm text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-secondary-800">
                        <h4 class="text-lg font-bold">{{ $note->title }}</h4>
                    </a>
                    <p class="text-secondary-500 text-sm">
                        {{ \Carbon\Carbon::parse($note->send_date)->format('M-d-Y h:i:s') }}
                    </p>
                </div>
                <div class="flex items-end justify-between mt-4 space-x-1 space-y-1">
                    <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                    <div class="flex gap-1">
                        <x-button.circle wire:navigate icon="eye" href='/note/{{ $note->id }}' />
                        <x-button.circle icon="trash" x-data="" negative
                            x-on:click.prevent="$openModal('confirm-note-deletion-{{ $i }}')" />
                    </div>

                    <x-modal name="confirm-note-deletion-{{ $i }}" :show="$errors->isNotEmpty()" focusable>
                        <x-card>
                            <div class="p-2">

                                <h2 class="text-lg font-medium text-secondary-900 dark:text-secondary-100">
                                    {{ __('Are you sure you want to delete your note?') }}
                                </h2>

                                <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                    {{ __('Once your note is deleted, all of its data will be permanently deleted.') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-button secondary x-on:click="close">
                                        {{ __('Cancel') }}
                                    </x-button>

                                    <x-button negative class="ms-3" wire:click="delete('{{ $note->id }}')"
                                        type='submit'>
                                        {{ __('Delete Note') }}
                                    </x-button>
                                </div>
                            </div>
                        </x-card>
                    </x-modal>
                </div>


            </x-card>
        @endforeach

        <div class="col-span-full mt-10">
            {{ $notes->links() }}
        </div>

    </div>
</div>
