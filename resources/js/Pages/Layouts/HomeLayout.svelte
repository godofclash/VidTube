<script>
    import '/resources/css/app.css'
    
    import Header from '../Components/Header.svelte';
</script>

<Header />

<main class="bg-slate-100 min-h-screen min-w-screen">
    <slot />
</main>