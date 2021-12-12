<script context="module">
    import Layout from '@/Layouts/App.svelte'
    export const layout = Layout
</script>

<script>
    import { Inertia } from '@inertiajs/inertia';
    import { useForm } from '@inertiajs/inertia-svelte';
    import {user} from '@/Stores/userStore';

    let form = useForm({
        email: '',
        password: '',
    });

    let submit = () => {
        $form.post(
            route('login'),
            {
                onSuccess: (page) => {
                    user.update(value => page.props?.user || null);
                }
            }
        );
    };
</script>


<form class="space-y-4">
    <section class="text-lg font-bold">Login</section>
    <section class="flex flex-col">
        <label for="email">Email</label>
        <input class="border border-gray-400 focus:border-blue-400 outline-none rounded px-4 py-2" bind:value={$form.email} type="email" id="email" name="email" />
        {#if $form.errors.email}
            <div class="text-sm text-red-500">
                { $form.errors.email }
            </div>
        {/if}
    </section>
    <section class="flex flex-col">
        <label for="password">Password</label>
        <input class="border border-gray-400 focus:border-blue-400 outline-none rounded px-4 py-2" bind:value={$form.password} type="password" id="password" name="password" />
        {#if $form.errors.password}
            <div class="text-sm text-red-500">
                { $form.errors.password }
            </div>
        {/if}
    </section>
    <section class="flex justify-end">
        <button class="rounded px-4 py-2 text-white bg-green-700 hover:bg-green-500" on:click|preventDefault={submit} disabled={$form.processing}>Login</button>
    </section>
</form>
