<template>
    <div class="h-[177px] w-[136px] rounded-md shadow-md overflow-hidden " >
       <!-- <slot></slot> -->
        <img class="h-[120px] w-full" :src="image" :alt="image" />
        <h3 class="text-center font-semibold">{{ name }}hhii</h3>
        <p class="text-center text-xs text-[#B6B6B6]">{{ description }}ghig</p>
    </div>
</template>

<script>
    export default {
        name: "Category",
        props: {
            image: String,
            name: String,
            description: String,
        }
    }
</script>