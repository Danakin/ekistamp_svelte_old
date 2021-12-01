<script context="module">
    import Layout from '@/Layouts/App.svelte'
    export const layout = Layout
</script>

<script>
    export let user;
    console.log(user);
    const name = user?.name || 'unknown';
</script>

<h1 class="text-2xl">
    Hello {name}!
</h1>
