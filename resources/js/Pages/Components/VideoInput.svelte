<script>
    import { onMount } from 'svelte'
    import { Error } from '.';

    export let input;
    export let error;

    let show;
    let video;
    let source;
    let button;

    onMount(() => {
        button.addEventListener("click", () => {
            input.click();
        })

        setTimeout(() => {
            error = null;
        }, 3000)
    });

    function onChange() {
        const file = input.files[0];
        
        if (file) {
            show = true;

            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.addEventListener("load", () => {
                source.src = reader.result;
                video.load();
            })

            return
        }

        show = false;
    }


</script>


<div>   
    <div>
        <input type="file" accept="video/*" bind:this={input} on:change={onChange} class="hidden">
        <button type="button" class="px-5 py-1 bg-indigo-100 outline-indigo-700 outline-2 outline rounded flex items-center gap-2" bind:this={button}>
            <span class="text-indigo-600">Upload Video</span>
            <i class="fa-solid fa-upload text-sm text-indigo-500 "></i>
        </button>
        
        
    </div>

    <div class="mt-4 h-40">
        {#if show} 
            <video bind:this={video} class="w-[240px] h-[135px]" controls>
                <source bind:this={source} src=""/>
                <track kind="captions">
            </video>
        {:else} 
            <div class="h-[135px] w-[240px] bg-indigo-50 rounded border-dashed border-indigo-500 border-2 flex items-center justify-center text-indigo-500 font-semibold text-sm">
                No Video was uploaded yet
            </div>
        {/if} 
        <Error {error}/>
    </div>
</div>