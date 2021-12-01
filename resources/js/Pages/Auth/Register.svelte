<script context="module">
    import Layout from '@/Layouts/Auth.svelte'
    export const layout = Layout
</script>

<script>
    import { Inertia } from '@inertiajs/inertia';
    import { useForm } from '@inertiajs/inertia-svelte';

    let form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    let submit = () => {
        $form.post(route('register'));
    };
</script>

Register New User

<form>
    <section>
        <label for="name">Username</label>
        <input bind:value={$form.name} type="text" id="name" name="name" />
        {#if $form.errors.name}
            { $form.errors.name }
        {/if}
    </section>
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
    <section>
        <label for="password_confirmation">Confirm Password</label>
        <input bind:value={$form.password_confirmation} type="password" id="password_confirmation" name="password_confirmation" />
        {#if $form.errors.password_confirmation}
            { $form.errors.password_confirmation }
        {/if}
    </section>

    <button on:click|preventDefault={submit}>Submit</button>
</form>
