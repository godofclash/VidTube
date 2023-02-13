<script>
    import { onMount } from 'svelte';

    export let video;

    let vid; 
    let duration; 

    onMount(() => {
        vid.load();
        console.log(video)
    })

</script>

<div class="flex gap-5 px-5 py-3 border-2 border-indigo-500 m-1">
    <div class="w-[320px] h-[180px]">
        <video 
            poster={"storage/" + video.thumbnail} 
            src={"storage/" + video.video} 
            controls 
            class="object-cover w-full h-full"
            bind:this={vid} 
            bind:duration
        > 
            <track kind="captions">
        </video>
    </div>

    <div class="">
        <h3 class="text-2xl text-indigo-500 font-semibold">{video.title}</h3>
        <div class="whitespace-pre-line w-[50ch]">
            {video.description}
        </div>
    </div>
</div>
