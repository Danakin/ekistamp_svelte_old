<script context="module">
    import Layout from '@/Layouts/App.svelte'
    export const layout = Layout
</script>

<script>
    import {Inertia} from '@inertiajs/inertia'
    // import Prefecture from '@/Pages/Search/Partials/Prefecture.svelte';
    // import City from '@/Pages/Search/Partials/City.svelte';
    // import Station from '@/Pages/Search/Partials/Station.svelte';
    // import { selectedPrefecture, selectedCity, selectedStation } from './searchStore';
    export let filters;
    export let prefectures;
    export let cities;

    let selected_prefecture_id = filters.prefecture;
    let selected_city_id = 0;

    $: selected_prefecture = prefectures.find((prefecture) => prefecture.id === Number(selected_prefecture_id));
    $: selected_city = cities.find((city) => city.id === Number(selected_city_id));
    $: Inertia.get(
        '/search',
        { prefecture: selected_prefecture_id },
        {
            preserveState: true,
            preserveScroll: true,
            only: ['cities'],
        }
    )
</script>

<h1 class="text-2xl">
    This is the search page!
</h1>

<section>
    <select bind:value={selected_prefecture_id} name="prefecture_id" id="prefecture_id">
        <option value="0">---</option>
        {#each prefectures as prefecture}
            <option value={prefecture.id}>{prefecture.name}</option>
        {/each}
    </select>
</section>

<section>
    Selected Prefecture: {selected_prefecture_id} -
    {#if selected_prefecture}
        {selected_prefecture.name}
    {:else}
        No Prefecture Selected
    {/if}
</section>

<section>
    <select bind:value={selected_city_id} name="city_id" id="city_id">
        <option value="0">---</option>
        {#each cities as city}
            <option value="{city.id}">{city.name}</option>
        {/each}
    </select>
</section>

<section>
    Selected City: {selected_city_id} -
    {#if selected_city}
        {selected_city.name}
    {:else}
        No City Selected
    {/if}
</section>


<!--<section>-->
<!--    <p>Store Information:</p>-->
<!--    <p>Prefecture: {$selectedPrefecture}</p>-->
<!--    <p>City: {$selectedCity}</p>-->
<!--    <p>Station: {$selectedStation}</p>-->
<!--</section>-->

<!--<section>-->
<!--    <Prefecture></Prefecture>-->
<!--</section>-->

<!--<section>-->
<!--    <City></City>-->
<!--</section>-->

<!--<section>-->
<!--    <Station></Station>-->
<!--</section>-->
