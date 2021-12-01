<script>
    import { inertia, Link } from '@inertiajs/inertia-svelte'
</script>

<nav>
    <a use:inertia href="/">Home</a>
    <a use:inertia href="/about">About</a>
    <a use:inertia href="/dashboard">Dashboard</a>
</nav>
