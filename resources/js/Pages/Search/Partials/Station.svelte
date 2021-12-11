<script>
    import {selectedPrefecture, selectedCity, selectedStation} from '@/Pages/Stations/searchStore';

    let stations = [];

    selectedPrefecture.subscribe(value => {
        selectedStation.update(() => 0);
        if (value > 0) {
            axios
                .get(route('api.stations.index', value))
                .then(res => {
                    if(res && res.data && res.data.data) {
                       stations = res.data.data;
                   }
                });
        }
    });

    selectedCity.subscribe(value => {
        selectedStation.update(() => 0);
        if (value > 0) {
            axios
                .get(route('api.stations.index.city', [$selectedPrefecture, value]))
                .then(res => {
                    if(res && res.data && res.data.data) {
                        stations = res.data.data;
                    }
                });
        }
    })
</script>

These are Station - selected: {$selectedStation}
<select bind:value={$selectedStation} name="stations" id="stations">
    <option value=0>---</option>
    {#each stations as station}
        <option value={station.id}>{station.name}</option>
    {/each}
</select>


