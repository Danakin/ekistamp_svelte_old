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
    <div class="flex flex-wrap">
        <label class="w-full sm:w-3/12" for="station_name">Station: </label>
        <input bind:value={stationName} class="flex-1 border border-gray-400 focus:border-blue-400 outline-none px-4 py-2 rounded"
               id="station_name" name="station_name" type="text" />
    </div>
    <div class="flex flex-wrap">
        <label class="w-full sm:w-3/12" for="prefecture_name">Prefecture: </label>
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
