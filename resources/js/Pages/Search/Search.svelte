<script context="module">
    import Layout from '@/Layouts/App.svelte'
    export const layout = Layout
</script>

<script>
    import Prefecture from '@/Pages/Search/Partials/Prefecture.svelte';
    import City from '@/Pages/Search/Partials/City.svelte';
    import Station from '@/Pages/Search/Partials/Station.svelte';
    import { selectedPrefecture, selectedCity, selectedStation } from './searchStore';
</script>

<h1 class="text-2xl">
    This is the search page!
</h1>

<section>
    <p>Store Information:</p>
    <p>Prefecture: {$selectedPrefecture}</p>
    <p>City: {$selectedCity}</p>
    <p>Station: {$selectedStation}</p>
</section>

<section>
    <Prefecture></Prefecture>
</section>

<section>
    <City></City>
</section>

<section>
    <Station></Station>
</section>
