<script>
    import { onMount } from "svelte";
    import { Error } from ".";

    export let input; 
    export let error;
    
    let button;
    let show; 
    let thumbnail; 

    onMount(() => {
        button.addEventListener("click", () => {
            input.click();
        })
        setTimeout(() => {
            error = '';
        }, 3000)
    })

    function onChange() {
        const file = input.files[0];

        if (file) {
            show = true;

            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.addEventListener("load", () => {
                thumbnail.src = reader.result;
            })
            return 
        }

        show = false;
    }


</script>

<div>
    <div>
        <input type="file" accept="image/*" bind:this={input} on:change|preventDefault={onChange} class="hidden">
        <button type="button" class="px-5 py-1 bg-indigo-100 outline-indigo-700 outline-2 outline rounded flex items-center gap-2" bind:this={button}>
            <span class="text-indigo-600">Upload Thumbnail</span>
            <i class="fa-solid fa-upload text-sm text-indigo-500 "></i>
        </button>
        
    </div>
    <div class="mt-4 h-40">
        {#if show} 
            <img bind:this={thumbnail} class="w-[240px] h-[135px]" src="" alt="">
        {:else} 
            <div class="h-[135px] w-[240px] bg-indigo-50 rounded border-dashed border-indigo-500 border-2 flex items-center justify-center text-indigo-500 font-semibold text-sm">
                No Thumbnail was uploaded yet
            </div>
        {/if} 
        <Error {error} />
    </div>
    
</div>