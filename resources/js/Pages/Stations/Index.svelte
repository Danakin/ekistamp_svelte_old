<script context="module">
    import Layout from '@/Layouts/App.svelte';

    export const layout = Layout;
</script>

<script>
    import {Inertia} from '@inertiajs/inertia';
    import {Link} from '@inertiajs/inertia-svelte';

    import debounce from '@/Helper/debounce';

    import Pagination from '@/Partials/Pagination.svelte';

    export let filters;
    export let stations;

    let stationName = filters.station;
    let prefectureName = filters.prefecture;

    $: debounce(() => Inertia.get(
        '/stations',
        {
            station: stationName,
            prefecture: prefectureName,
        },
        {
            preserveState: true,
        },
    ), 500);
</script>

<section class="flex flex-col space-y-2 mb-4" id="search">
    <div class="flex flex-wrap items-center">
        <label class="w-full w-24" for="station_name">Station: </label>
        <input bind:value={stationName} class="flex-1 border border-gray-400 focus:border-blue-400 outline-none px-4 py-2 rounded"
               id="station_name" name="station_name" type="text" />
    </div>
    <div class="flex flex-wrap items-center">
        <label class="w-full w-24" for="prefecture_name">Prefecture: </label>
        <input bind:value={prefectureName} class="flex-1 border border-gray-400 focus:border-blue-400 outline-none px-4 py-2 rounded"
               id="prefecture_name" name="prefecture_name" type="text" />
    </div>
</section>

<section class="flex flex-col" id="stations">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Kanji</th>
            <th>Prefecture</th>
            <th>City</th>
            <th>Lines</th>
            <th>Stamp</th>
        </tr>
        </thead>
        <tbody>

        {#each stations.data as station}
            <tr class="divide-x divide-white even:divide-gray-200 odd:bg-gray-200">
                <td class="p-2 text-center">{station.id}</td>
                <td class="p-2">
                    <ruby>
                        {station.name}
                        <rp>(</rp>
                        <rt>{station.hiragana}</rt>
                        <rp>)</rp>
                    </ruby>
                    <div class="text-xs capitalize">{station.romaji}</div>
                </td>
                <td class="p-2 capitalize">
                    {station.prefecture.name}
                    <div class="text-xs capitalize">({station.prefecture.romaji})</div>
                </td>
                <td class="p-2 capitalize">
                    {station.city.name}
                    <div class="text-xs capitalize">({station.city.romaji})</div>
                </td>
                <td class="p-2">
                    {station.lines.map(line => line.name).join(',')}
                </td>
                <td class="p-2">
                    {#if station.stamps.length > 0}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    {:else}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    {/if}
                </td>
            </tr>
        {/each}
        </tbody>
    </table>
</section>

<Pagination bind:links={stations.links} />
