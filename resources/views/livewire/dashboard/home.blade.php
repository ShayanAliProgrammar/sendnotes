<?php

use Livewire\Volt\Component;

new class extends Component {
    public $notes_count;
    public $likes_count;

    public function placeholder()
    {
        return view('components.loadings.dashboard');
    }

    public function mount()
    {
        $notes = Auth::user()
            ->notes()
            ->where('is_published', true)
            ->get('likes_count');

        $this->notes_count = count($notes);

        $total_likes = 0;

        foreach ($notes as $note) {
            $total_likes += $note->likes_count;
        }

        $this->likes_count = $total_likes;
    }
}; ?>

<div class='grid place-items-center gap-4 gid-cols-1 md:grid-cols-2'>
    <x-card>
        <div class="flex flex-col">
            <h3 class='text-lg font-medium'>Total Notes</h3>
            <p class='font-bold ml-auto'>{{ $notes_count }}</p>
        </div>
    </x-card>
    <x-card>
        <div class="flex flex-col">
            <h3 class='text-lg font-medium'>Total Likes</h3>
            <p class='font-bold ml-auto'>{{ $likes_count }}</p>
        </div>
    </x-card>
</div>
