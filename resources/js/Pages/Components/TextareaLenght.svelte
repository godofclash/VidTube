<script lang="ts">

    export let text;
    export let maxLength;

    let length; 

    let color = ""; 

    function changeColor() {
        if (length > 275 ) {
            color = "text-red-500";
        }
        else if(length > 250) {
            color = "text-orange-500"
        }
        else if(length > 200) {
            color = "text-yellow-500"
        }
        else {
            color = "";
        }
    }

    $: text ? length = text.length : length = 0;
    $: length, changeColor()

</script>

<span class={color + " float-right"}>{300 - length}/{maxLength}</span>