<script>
    import { inertia } from '@inertiajs/inertia-svelte'
</script>

<nav>
    <a use:inertia href="/login">Login</a>
    <a use:inertia href="/register">Register</a>
</nav>
