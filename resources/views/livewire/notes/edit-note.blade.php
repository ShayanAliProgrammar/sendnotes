<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;
    public string $title;
    public string $body;
    public string $recipient;
    public string $send_date;
    public string $is_published;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);

        $this->fill($note);

        $this->title = $note->title;
        $this->body = $note->body;
        $this->recipient = $note->recipient;
        $this->send_date = $note->send_date;
    }

    public function edit_note()
    {
        $validated = $this->validate([
            'title' => 'required',
            'body' => ['required', 'min:10'],
            'recipient' => ['required'],
            'send_date' => ['required'],
            'is_published' => 'min:0',
        ]);

        $validated['send_date'] = \Carbon\Carbon::parse($validated['send_date'])->format('m/d/Y h:i:00');

        if ($validated['is_published'] === '') {
            $validated['is_published'] = false;
        }

        if ($validated['is_published'] === '1') {
            $validated['is_published'] = true;
        }

        $this->note->update($validated);
        $this->dispatch('note-updated');
        return $this->dispatch('note-updated');
    }
}; ?>


<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
                {{ __('Edit Note') }}
            </h2>

            <x-button primary :href="route('notes')" wire:navigate label='Show Notes' />

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-secondary-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-secondary-900 dark:text-secondary-100">
                    <form wire:submit='edit_note'>
                        <!-- Title -->
                        <div>
                            <x-input label="{{ __('Title') }}" wire:model="title" id="title"
                                class="block mt-1 w-full" type="text" name="title" autofocus autocomplete="off" />
                        </div>

                        <!-- Note Body -->
                        <div class="mt-4">
                            <x-textarea label="{{ __('Content') }}" wire:model="body" id="body"
                                class="block mt-1 w-full" type="text" name="body" autocomplete="off" />
                        </div>


                        <!-- Recipient -->
                        <div class="mt-4">
                            <x-input label="{{ __('Recipient') }}" wire:model="recipient" id="recipient"
                                class="block mt-1 w-full" type="email" name="recipient" autocomplete="email" />
                        </div>


                        <!-- Send Date -->
                        <div class="mt-4">
                            <x-datetime-picker label="{{ __('Send Date') }}" wire:model="send_date" id="send_date"
                                name="send_date" />
                        </div>


                        <!-- Send Date -->
                        <div class="mt-4">
                            @if ($is_published == '1')
                                <x-toggle label="{{ __('Published') }}" wire:model="is_published" id="is_published"
                                    name="is_published" checked />
                            @else
                                <x-toggle label="{{ __('Published') }}" wire:model="is_published" id="is_published"
                                    name="is_published" />
                            @endif
                        </div>


                        <div class="mt-4 flex gap-2 items-center">
                            <x-button type='submit' primary>
                                {{ __('Update') }}
                            </x-button>

                            <x-action-message class="me-3" on="note-updated">
                                {{ __('Updated.') }}
                            </x-action-message>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
