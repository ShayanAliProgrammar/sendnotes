<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $body;
    public string $recipient;
    public string $send_date;

    public function add_note()
    {
        $validated = $this->validate([
            'title' => ['required', 'min:5', 'max:25'],
            'body' => ['required', 'min:10'],
            'recipient' => ['required'],
            'send_date' => ['required'],
        ]);

        $validated['send_date'] = \Carbon\Carbon::parse($validated['send_date'])->format('m/d/Y h:i:00');
        $validated['is_published'] = false;

        auth()
            ->user()
            ->notes()
            ->create($validated);

        return $this->redirect(route('notes'), navigate: true);
    }
}; ?>

<div>
    <form wire:submit='add_note'>
        <!-- Title -->
        <div>
            <x-input label="{{ __('Title') }}" wire:model="title" id="title" class="block mt-1 w-full" type="text"
                name="title" autofocus autocomplete="off" />
        </div>

        <!-- Note Body -->
        <div class="mt-4">
            <x-textarea label="{{ __('Content') }}" wire:model="body" id="body" class="block mt-1 w-full"
                type="text" name="body" autocomplete="off" />
        </div>


        <!-- Recipient -->
        <div class="mt-4">
            <x-input label="{{ __('Recipient') }}" wire:model="recipient" id="recipient" class="block mt-1 w-full"
                type="email" name="recipient" autocomplete="email" />
        </div>


        <!-- Send Date -->
        <div class="mt-4">
            <x-datetime-picker label="{{ __('Send Date') }}" wire:model="send_date" id="send_date" name="send_date" />
        </div>


        <div class="mt-4">
            <x-button type='submit' primary>
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
</div>
