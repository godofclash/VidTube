<script>
    import { Link } from '@inertiajs/svelte';
    import { getTime } from '../functions';

    export let video;

    let time;

    $: time = getTime(video.created_at)   

    console.log(video)

</script>

<div class="flex gap-5 px-5 py-3 border-2 border-indigo-500 m-1">
    <Link class="w-[320px] h-[180px]" href={"/videos/" + video.id}>
        <img src={"/storage/" + video.thumbnail} alt="Video Preview" class="w-full h-full object-cover">
    </Link>

    <div class="">
        <Link href={"/videos/" + video.id}>
            <h3 class="text-2xl text-indigo-500 font-semibold">{video.title}</h3>
        </Link>
       
        <span class="mt-1 mb-2">By {video.user.username} {time} ago</span>
        <p>{video.views.length} {video.views.length == 1 ? 'view' : 'views'}</p>
        
    </div>
</div>
