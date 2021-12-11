<script>
    import {Link} from '@inertiajs/inertia-svelte';
    export let links;
</script>

<section class="flex flex-wrap my-4 space-x-2">
    {#each links as link}
        {#if link.url}
            <Link class="py-2 px-4 border border-gray-200 hover:bg-gray-200 rounded text-gray-700" href="{link.url}">{@html link.label}</Link>
        {:else}
            <div class="py-2 px-4 border border-gray-200 hover:bg-gray-200 rounded text-gray-400 cursor-not-allowed">{@html link.label}</div>
        {/if}
    {/each}
</section>
