<script context="module">
    import Layout from '@/Layouts/App.svelte';

    export const layout = Layout;
</script>

<script>
    import {Inertia} from '@inertiajs/inertia';
    import {Link} from '@inertiajs/inertia-svelte';

    import debounce from '@/Helper/debounce'

    import Pagination from '@/Partials/Pagination.svelte';

    export let filters;
    export let stations;

    let stationName = filters.station;

    $: debounce(() => Inertia.get(
        '/stations',
        {
            station: stationName,
        },
        {
            preserveState: true,
        }
    ), 500);
</script>

<section class="flex flex-col" id="search">
    <div>
        <label for="station_name">Station: </label>
        <input type="text" id="station_name" name="station_name" bind:value={stationName} />
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
            <th>Has Stamp</th>
        </tr>
        </thead>
        <tbody>

        {#each stations.data as station}
            <tr class="divide-x divide-white even:divide-gray-200 odd:bg-gray-200">
                <td class="p-2">{station.id}</td>
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
                <td class="p-2">{station.has_stamp}</td>
            </tr>
        {/each}
        </tbody>
    </table>
</section>

<Pagination bind:links={stations.links} />
