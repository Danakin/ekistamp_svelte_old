<script>
    import {selectedPrefecture, selectedCity} from '@/Pages/Stations/searchStore';

    let cities = [];

    selectedPrefecture.subscribe(value => {
        selectedCity.update(value => 0);
        if (value > 0) {
        axios
            .get(route('api.cities.index', value))
            .then(res => {
                if(res && res.data && res.data.data) {
                    cities = res.data.data;
                }
            })
        }
    });
</script>

These are Cities - selected: {$selectedCity}
<select bind:value={$selectedCity} name="cities" id="cities">
    <option value=0>---</option>
    {#each cities as city}
        <option value={city.id}>{city.name}</option>
    {/each}
</select>


