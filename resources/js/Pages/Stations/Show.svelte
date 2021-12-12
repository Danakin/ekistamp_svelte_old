<script context="module">
    import Layout from '@/Layouts/App.svelte';

    export const layout = Layout;
</script>

<script>
    import {Inertia} from '@inertiajs/inertia';
    import {Link} from '@inertiajs/inertia-svelte';

    import { page } from '@inertiajs/inertia-svelte'

    import debounce from '@/Helper/debounce'

    export let station;
    export let userStamps;

    console.log(station);
    console.log(userStamps);
</script>

<section class="flex items-center">
    <Link class="flex items-center mr-2" href="{route('stations.index')}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Stations List
    </Link>
    / { station.id }
</section>

<section>
    <h1 class="text-2xl capitalize">
        <ruby>
            {station.name}
            <rp>(</rp>
            <rt>{station.hiragana}</rt>
            <rp>)</rp>
        </ruby>
        - { station.romaji }
    </h1>
</section>

<section class="border rounded border-gray-400 p-4">

</section>
