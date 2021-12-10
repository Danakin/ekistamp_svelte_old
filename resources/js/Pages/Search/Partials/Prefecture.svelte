<script>
    import {selectedPrefecture} from '@/Pages/Search/searchStore';

    let prefectures = [];
    axios
        .get(route('api.prefectures.index'))
        .then(res => {
            if(res && res.data && res.data.data) {
                prefectures = res.data.data;
            }
        })
</script>

These are Prefectures - selected: {$selectedPrefecture}
<select bind:value={$selectedPrefecture} name="prefectures" id="prefectures">
    <option value=0>---</option>
    {#each prefectures as prefecture}
        <option value={prefecture.id}>{prefecture.name}</option>
    {/each}
</select>


