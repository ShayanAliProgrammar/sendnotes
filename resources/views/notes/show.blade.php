<x-guest-layout>
    <div class="flex flex-col justify-between">
        <h1 class="text-2xl font-semibold leading-tight text-gray-800">
            {{ $note->title }}
        </h1>
        <p class="text-sm mt-2">{{ $note->body }}</p>
        <div class="mt-4 ml-auto flex gap-3 items-center">
            <h3 class='text-sm font-bold'>From: {{ $user->name }}</h3>
            <livewire:note.like_component :note='$note' />
        </div>
</x-guest-layout>
