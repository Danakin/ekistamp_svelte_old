<script>
    import {Link} from '@inertiajs/inertia-svelte';
    export let links;
</script>

<section class="flex">
    {#each links as link}
        {#if link.url}
            <Link href="{link.url}">{@html link.label}</Link>
        {:else}
            <div>{@html link.label}</div>
        {/if}
    {/each}
</section>
