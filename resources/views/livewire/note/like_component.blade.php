<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;
    public $likes_count;
    public $is_liking;

    public function mount(Note $note)
    {
        $this->note = $note;
        $this->likes_count = $this->note->likes_count;
        $this->is_liking = false;
    }

    public function increase_like()
    {
        $this->is_liking = true;

        $new_likes_count = intval($this->likes_count) + 1;

        $this->note->update([
            'likes_count' => $new_likes_count,
        ]);

        $this->likes_count = $new_likes_count;

        $this->is_liking = false;
    }
}; ?>

<div>
    <x-button icon='thumb-up' xs wire:click.prefetch='increase_like' type='button'
        primary>{{ intval($likes_count) }}</x-button>
</div>
