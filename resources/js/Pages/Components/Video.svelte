<script>
    import { getTime } from '../functions';
    import { onMount } from 'svelte';
    import { router } from '@inertiajs/svelte';

    export let video;

    let time;
    let vid;

    $: time = getTime(video.created_at)  
    
    onMount(() => {
        vid.load()
    })

    $: console.log(video)

    function handleLike() {
        router.post('/videos/like', {
            'video_id': video.id, 
        })
    }

</script>

<div class="flex gap-5 px-5 py-3">
    <div class="w-[85%] h-auto">
        <video 
            poster={"/storage/" + video.thumbnail} 
            src={"/storage/" + video.video} 
            controls 
            class="object-cover w-full h-full"
            bind:this={vid} 
        > 
            <track kind="captions">
        </video>
    </div>
    

    <div class="">
        <h3 class="text-2xl text-indigo-500 font-semibold">{video.title}</h3>
        <span class="mt-1 mb-2">By {video.user.username} {time} ago</span>
        <p>{video.views.length} {video.views.length == 1 ? 'view' : 'views'}</p>
        <div class="whitespace-pre-line w-[50ch]">
            {video.description}
        </div>
        <div class="flex gap-2 items-center h-9">
            <span class="relative top-1">{video.likes.length}</span>
            <button on:click={handleLike} class="fa-solid fa-heart text-red-500 outline outline-1 outline-slate-700 rounded-full mt-2 p-2 transition-all hover:bg-indigo-200 cursor-pointer"></button>
        </div>
    </div>
</div>
