<script>
    import {Link} from '@inertiajs/inertia-svelte';
    import {fade} from 'svelte/transition'

    export let id;
    export let line;

    let open = false;
</script>


<div class="flex flex-col flex-1">
    <div on:click={() => open = !open} class="cursor-pointer hover:bg-gray-200 px-4 py-2">{line.name}</div>
    {#if open}
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-9 border border-gray-200"
             transition:fade={{duration: 100}}
        >
            {#each line.stations as lineStation}
                <Link class="{lineStation.id !== id ? 'text-gray-400' : ''} text-center  py-2 px-4 hover:bg-gray-200 hover:text-black"
                      href="{window.route('stations.show', lineStation.id)}"
                >
                    {lineStation.name}
                </Link>
            {/each}
        </div>
    {/if}
</div>
