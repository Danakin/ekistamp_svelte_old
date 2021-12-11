<script context="module">
    import Layout from '@/Layouts/App.svelte';

    export const layout = Layout;
</script>

<script>
    import {Inertia} from '@inertiajs/inertia';
    import {Link} from '@inertiajs/inertia-svelte';
    import Pagination from '@/Partials/Pagination.svelte';

    export let stations;

    console.log(stations);
</script>

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
            <tr>
                <td>{station.id}</td>
                <td>
                    <ruby>
                        {station.name}
                        <rp>(</rp>
                        <rt>{station.hiragana}</rt>
                        <rp>)</rp>
                    </ruby>
                    <div class="text-xs capitalize">{station.romaji}</div>
                </td>
                <td class="capitalize">
                    {station.prefecture.name} <div class="text-xs capitalize">({station.prefecture.romaji})</div>
                </td>
                <td class="capitalize">
                    {station.city.name} <div class="text-xs capitalize">({station.city.romaji})</div>
                </td>
                <td>
                    {station.lines.map(line => line.name).join(',')}
                </td>
                <td>{station.has_stamp}</td>
            </tr>
        {/each}
        </tbody>
    </table>
</section>

<Pagination bind:links={stations.links} />
