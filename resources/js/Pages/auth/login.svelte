<script lang="ts">
    import AuthLayout from '../Layouts/AuthLayout.svelte';
    import { useForm, Link } from '@inertiajs/svelte'

    const form = useForm({
        username: '', 
        password: ''
    });

    const handleSubmit = () => {
        $form.post('/login', {
            onError: () => {
                $form.password = '';
            }, 
            
        })
    }

</script>

<AuthLayout>
    <div class="mb-10">
        <h1 class="text-indigo-500 text-2xl font-bold">Login</h1>
        <p class="mt-1">
            Login or 
            <Link href="/register" class="text-indigo-500 font-semibold">Register</Link>
            instead
        </p>
    </div>

    <form on:submit|preventDefault={handleSubmit} class="flex flex-col gap-6 items-baseline">
        <div class="w-64 h-9">
            <input type="text" autocomplete="username" bind:value={$form.username} placeholder="Username" class="px-4 py-1 outline outline-2 outline-slate-700 rounded  focus:outline-3 focus:outline-indigo-500 w-full">

            {#if $form.errors.username}
                <span class="text-red-500 text-xs">{$form.errors.username}</span>
            {/if}
        </div>
        <div class="w-64 h-9">
            <input type="password" autocomplete="current-password" bind:value={$form.password} placeholder="Password" class=" px-4 py-1 outline outline-2 outline-slate-700 rounded focus:outline-3 focus:outline-indigo-500 w-full">

            {#if $form.errors.password}
                <span class="text-red-500 text-xs">{$form.errors.password}</span>
            {/if}
        </div>
        
        <button type="submit" class="outline-slate-700 outline-2 px-3 py-1 outline rounded hover:outline-3 hover:outline-indigo-500">Submit</button>
    </form>
</AuthLayout>

