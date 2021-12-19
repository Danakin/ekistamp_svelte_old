<script context="module">
    import Layout from '@/Layouts/App.svelte';

    export const layout = Layout;
</script>

<script>
    import {Inertia} from '@inertiajs/inertia';
    import {Link} from '@inertiajs/inertia-svelte';

    import {page} from '@inertiajs/inertia-svelte';

    import debounce from '@/Helper/debounce';
    import Line from '@/Pages/Stations/Partials/Line.svelte';
    import Stamp from '@/Pages/Stations/Partials/Stamp.svelte';

    export let station;
    export let userStamps;
</script>

<section class="flex items-center mb-4">
    <Link class="flex items-center mr-2" href="{route('stations.index')}">
        <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
        </svg>
        Stations List
    </Link>
    / Details
</section>

<section class="mb-4 grid grid-cols-1 sm:grid-cols-4 w-full items-stretch gap-4">
    <h1 class="break-all border border-gray-400 rounded flex flex-wrap items-center justify-center px-4 py-2">
        <ruby class="text-2xl">
            {station.name}
            <rp>(</rp>
            <rt>{station.hiragana}</rt>
            <rp>)</rp>
        </ruby>
        <p class="capitalize break-all">({ station.romaji })</p>
    </h1>

    <section class="sm:col-span-3 border rounded border-gray-400 p-4 flex flex-col space-y-4">
        <article class="flex items-center">
            <div class="w-24">Prefecture</div>
            <div class="capitalize">
                <ruby>
                    {station.prefecture.name}
                    <rp>(</rp>
                    <rt>{station.prefecture.hiragana}</rt>
                    <rp>)</rp>
                </ruby>
                - { station.prefecture.romaji }
            </div>
        </article>
        <article class="flex items-center">
            <div class="w-24">City</div>
            <div class="capitalize">
                <ruby>
                    {station.city.name}
                    <rp>(</rp>
                    <rt>{station.city.hiragana}</rt>
                    <rp>)</rp>
                </ruby>
                - { station.city.romaji }
            </div>
        </article>
    </section>

    <section class="sm:col-span-4 border border-gray-400 rounded">
        <div class="text-lg font-bold py-2 px-4">スタンプ情報 - Stamp Information</div>
        <div class="capitalize flex flex-col space-y-2">
            {#each station.stamps as stamp (stamp.id)}
                <Stamp bind:id={station.id} bind:stamp={stamp} />
            {/each}
        </div>
    </section>

    <section class="sm:col-span-4 flex flex-col border border-gray-400 rounded">
        <div class="text-lg font-bold py-2 px-4">路線情報 - Lines</div>
        <div class="capitalize flex flex-col space-y-2">
            {#each station.lines as line (line.id)}
                <Line bind:id={station.id} bind:line={line} />
            {/each}
        </div>
    </section>
</section>
