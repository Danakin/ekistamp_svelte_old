<script context="module">
    import Layout from '@/Layouts/Auth.svelte'
    export const layout = Layout
</script>

<script>
    import { Inertia } from '@inertiajs/inertia';
    import { useForm } from '@inertiajs/inertia-svelte';

    let form = useForm({
        email: '',
        password: '',
    });

    let submit = () => {
        $form.post(route('login'));
    };
</script>

Login

<form>
    <section>
        <label for="email">Email</label>
        <input bind:value={$form.email} type="email" id="email" name="email" />
        {#if $form.errors.email}
            { $form.errors.email }
        {/if}
    </section>
    <section>
        <label for="password">Password</label>
        <input bind:value={$form.password} type="password" id="password" name="password" />
        {#if $form.errors.password}
            { $form.errors.password }
        {/if}
    </section>

    <button on:click|preventDefault={submit} disabled={$form.processing}>Submit</button>
</form>
