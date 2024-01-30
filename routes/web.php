<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('home')->middleware('cache.headers:private;max_age=36000');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes');

Route::view('note/create', 'notes.create')
    ->middleware(['auth'])
    ->name('create-note');

Volt::route('notes/{note}/edit', 'notes.edit-note')
    ->middleware(['auth'])
    ->name('edit-note');

Route::get('/note/{note}', function (Note $note) {
    if (!$note->is_published) {
        return abort(404);
    }

    $user = $note->user;

    return view('notes.show', compact('note', 'user'));
})->name('show-note')->middleware('cache.headers:private;max_age=36000');

require __DIR__ . '/auth.php';
