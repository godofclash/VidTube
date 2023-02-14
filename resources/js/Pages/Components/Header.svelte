<script>
    import { Link, router } from "@inertiajs/svelte";

    function logout() {
        router.post('/logout');
    }

</script>

<header class="flex items-center justify-around h-16 shadow-xl border-b-3 border-indigo-500 mb-3">
    <div class="h-full flex gap-5 items-center">
        <h2 class="font-poppins text-indigo-700 font-bold text-2xl">VidTube</h2>
        <img src="/logo.png" alt="Logo" class="h-1/2">
    </div>
    

    <ul class="flex items-center h-full gap-7">
        <li class="font-poppins text-indigo-500 font-semibold text-xl">
            <Link href="/">Home</Link>
        </li>
        <li class="font-poppins text-indigo-500 font-semibold text-xl">
            <Link href="/videos/create">Create</Link>
        </li>
    </ul>
    
    <button class="text-indigo-500 text-lg font-bold font-poppins" on:click|preventDefault={logout}>Logout</button>
    
</header>