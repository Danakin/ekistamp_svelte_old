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

    console.log($page);
</script>

<section>
    <Link href="{route('stations.index')}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
    </Link>
</section>

<section>
    Show Station
</section>

<section>
    {station.name}
</section>
