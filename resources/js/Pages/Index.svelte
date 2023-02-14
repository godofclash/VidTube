<script>
    import { VideoPreview } from "./Components";
    import { HomeLayout } from "./Layouts"

    export let videos;
    export let user;

</script>

<svelte:head>
    <title>Home</title>
</svelte:head>

<HomeLayout>
    {#each videos as video}
        <VideoPreview {video} />
    {/each}
</HomeLayout>
    

