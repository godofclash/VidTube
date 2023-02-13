<script>
    export let error;
</script>
{#if error}
    <span class="text-red-500 text-xs">{error}</span>
{/if}
