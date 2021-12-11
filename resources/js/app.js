require('./bootstrap');

// import { createApp, h } from 'vue';
// import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

import { createInertiaApp } from '@inertiajs/inertia-svelte'

createInertiaApp({
    id: 'app',
    resolve: name => require(`./Pages/${name}.svelte`),
    setup({ el, App, props }) {
        new App({ target: el, props });
    },
})

InertiaProgress.init({ color: '#4B5563' });
