<script>
    import Navigation from './Partials/Navigation/Auth.svelte';
</script>

<Navigation></Navigation>

<main class="w-full min-h-screen flex justify-center items-center">
    <article class="rounded-xl border border-green-700 p-8">
        <slot />
    </article>
</main>
