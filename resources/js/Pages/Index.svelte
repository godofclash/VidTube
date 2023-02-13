<script>
    import { Video } from "./Components";
    import { HomeLayout } from "./Layouts"
    import { Link } from "@inertiajs/svelte";

    export let videos;

</script>

<HomeLayout>
    {#each videos as video}
        <Video {video} />
    {/each}

    <Link href="/videos/create">Create</Link>
</HomeLayout>
    

