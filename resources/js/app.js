import('./bootstrap.js');

document.documentElement.setAttribute('data-update-uri', '/livewire/update')

import {Alpine, Livewire} from '../../vendor/livewire/livewire/dist/livewire.esm';

Livewire.start();
