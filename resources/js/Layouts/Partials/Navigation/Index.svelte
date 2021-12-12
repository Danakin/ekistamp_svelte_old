<script>
    import NavLink from '@/Layouts/Partials/Navigation/Partials/NavLink.svelte';
    import {page} from '@inertiajs/inertia-svelte';

    let user = $page.props?.user ?? undefined;
    let open = false;
</script>

{#if open}
    <div class="fixed top-0 left-0 right-0 bottom-0 bg-gray-500 opacity-75 sm:hidden"
         on:click={() => open = false}></div>
{/if}

<div class="fixed sm:hidden bottom-8 right-8 border rounded w-12 h-12 p-2 flex items-center justify-center bg-white"
     on:click={() => open = !open}>
    <span class="transform transition w-10 h-px bg-black absolute"
          class:-translate-y-3={!open}
          class:rotate-45={open}
          class:translate-y-0={open}
    ></span>

    <span class="transform transition w-10 h-px bg-black absolute"
          class:opacity-0={open}
          class:opacity-100={!open}
          class:translate-x-3={open}

    ></span>

    <span class="transform transition w-10 h-px bg-black absolute"
          class:-rotate-45={open}
          class:translate-y-0={open}
          class:translate-y-3={!open}
    ></span>
</div>

<nav
    class="bg-white fixed top-0 left-0 sm:bottom-auto sm:right-0 w-64 sm:w-auto h-screen sm:h-12 transition-all duration-200 shadow flex flex-col sm:flex-row justify-between sm:translate-x-0"
    class:-translate-x-64={!open}
>
    <section class="flex flex-col sm:flex-row" id="nav-links">
        <NavLink href="{window.route('home')}">Home</NavLink>
        <NavLink href="{window.route('about')}">About</NavLink>
        {#if user}
        <NavLink href="{window.route('dashboard')}">Dashboard</NavLink>
        <NavLink href="{window.route('stations.index')}">Stations</NavLink>
        {/if}
    </section>
    <section class="flex flex-col sm:flex-row" id="account-section">
    {#if user}
        <NavLink href="{window.route('logout')}" method="POST">
            <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" />
            </svg>
            Logout
        </NavLink>
    {:else}
        <NavLink href="/login">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            Login
        </NavLink>
        <NavLink href="/register">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            Register
        </NavLink>
    {/if}
    </section>
</nav>
