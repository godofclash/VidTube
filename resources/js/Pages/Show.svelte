<script>
    import { HomeLayout } from "./Layouts";
    import { Video } from "./Components";

    export let user;
    export let video;
    export let likes;


</script>

<svelte:head>
    <title>{video.title}</title>
</svelte:head>

<HomeLayout {user}>
    <Video {video}/>
</HomeLayout>