<script>
    import NavLink from '@/Layouts/Partials/Navigation/Partials/NavLink.svelte';
</script>

<nav class="bg-white fixed top-0 left-0 right-0 h-12 shadow flex justify-between">
    <section class="flex" id="nav-links">
        <NavLink href="{window.route('home')}">Home</NavLink>
        <NavLink href="{window.route('about')}">About</NavLink>
        <NavLink href="{window.route('dashboard')}">Dashboard</NavLink>
        <NavLink href="{window.route('stations.index')}">Stations</NavLink>
    </section>
    <section class="flex" id="account-section">
        <NavLink href="{window.route('logout')}" method="POST">Logout</NavLink>
    </section>
</nav>
