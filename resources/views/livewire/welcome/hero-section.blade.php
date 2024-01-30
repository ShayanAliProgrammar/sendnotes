<?php

use Livewire\Volt\Component;

new class extends Component {
    public function placeholder()
    {
        return view('components.loadings.hero-section');
    }
}; ?>

<section
    class='grid grid-cols-1 w-full container h-full place-items-center mx-auto max-w-6xl md:grid-cols-5 gap-5 py-20'>
    <div class='col-span-3 flex flex-col gap-4 w-full'>
        <h1 class="text-5xl md:text-6xl font-bold">Ready to send notes to your friend/ friends.</h1>
        <p class='text-base md:text-lg max-w-sm'>A way to send scheduled notes to your friends via email.</p>
        <x-button primary class='w-max mt-3' label='Get Started' href='/login' />
    </div>
    <div class='w-full border col-span-2 bg-white grid place-items-center h-full'>image</div>
</section>
