<script>
    import '/resources/css/app.css'
    
    import Header from '../Components/Header.svelte';

</script>

<svelte:body class="min-h-screen min-w-screen bg-slate-100"/>

<Header/>

<main>
    <slot />
</main>