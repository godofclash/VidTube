<script>
    import '/resources/css/app.css'

    import Header from '../Components/Header.svelte';

</script>

<Header/>
<main class="bg-slate-200 h-screen w-screen flex items-center justify-center">
    <section class="px-16 py-10 rounded-lg bg-white shadow-lg">
        <slot />
    </section>
</main>

