<script lang="ts">
    import { CreateLayout } from "./Layouts";
    import { VideoInput, ThumbnailInput, Error, TextareaLength } from "./Components";
    import { useForm } from "@inertiajs/svelte";
 
    export let errors;
    export let user;

    let videoInput;
    let thumbnailInput;

    const form = useForm({
        video: null, 
        thumbnail: null,
        description: null,
        title: null, 
    })

    function handleSubmit() {
        $form.video = videoInput.files[0];
        $form.thumbnail = thumbnailInput.files[0];

        $form.post('/videos/store')
    }
    
</script>

<CreateLayout {user}>

    <form enctype="multipart/form-data" class="font-poppins" on:submit|preventDefault={handleSubmit}>
        <h1 class="text-3xl font-semibold">Upload Your Video</h1>
        <div class="flex mt-12">
            <div class="mr-12">
                <VideoInput bind:input={videoInput} error={errors.video} />
                
                <ThumbnailInput bind:input={thumbnailInput} error={errors.thumbnail}/>
            </div>

            <div>
                <div class="mb-8">
                    <label for="title" class="text-xl">Title</label>
                    <input 
                        bind:value={$form.title} 
                        type="text" 
                        id="title" 
                        name="title"
                        placeholder="Your video title" 
                        class="block rounded px-3 py-1 w-96 outline outline-1 outline-slate-700 focus:outline-indigo-500 focus:outline-2 focus:bg-indigo-100"
                    >
                    <Error error={errors.title}/>
                </div>
    
                <div>
                    <label for="description">Description</label>
                    <textarea 
                        bind:value={$form.description} 
                        id="description" 
                        name="description"
                        maxlength="300"
                        class="block resize-none h-56 w-96 outline outline-1 outline-slate-700 focus:outline-2 focus:outline-indigo-500 focus:bg-indigo-100 px-3 py-1 rounded" 
                        placeholder="Your video description"
                    />
                    <TextareaLength bind:text={$form.description} maxLength="300"/>
                    <Error error={errors.description}/>
                </div>
                
            </div>
        </div>

        <button type="submit" class="px-5 py-1 border-slate-700 border-1 rounded">Upload</button>
    </form>
    
</CreateLayout>
