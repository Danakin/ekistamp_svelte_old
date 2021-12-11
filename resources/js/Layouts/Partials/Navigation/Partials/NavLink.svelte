<script>
    import {Link} from '@inertiajs/inertia-svelte';

    export let href;
    export let method;

</script>

<Link class="flex items-center p-4 hover:bg-gray-200"
      href="{href}"
      method="{method}"
>
    <slot />
</Link>
