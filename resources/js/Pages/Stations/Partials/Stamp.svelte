<script>
    export let stamp;

    let open = false;
    console.log(stamp)
</script>

<div class="flex flex-col flex-1">
    <article class="px-4 py-2 hover:bg-gray-200 cursor-pointer" on:click={() => open = !open}>
        {stamp.name} - {stamp.name_eng} - {open}
    </article>
</div>
