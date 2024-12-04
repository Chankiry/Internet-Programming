<template>
    <div v-if="buy === '1'">
        <RouterLink to="/HotDeal">
            <div class="h-[177px] w-[136px] rounded-md shadow-md overflow-hidden " >
        <!-- <slot></slot> -->
                <img class="h-[120px] w-full" :src="image" :alt="image" />
                <h3 class="text-center font-semibold text-black">{{ name }}</h3>
                <p class="text-center text-xs text-[#B6B6B6]">{{ description }}</p>
            </div>
         </RouterLink>
    </div>
    <div v-else>
        <div class="h-[177px] w-[136px] rounded-md shadow-md overflow-hidden " >
        <!-- <slot></slot> -->
                <img class="h-[120px] w-full" :src="image" :alt="image" />
                <h3 class="text-center font-semibold text-black">{{ name }}</h3>
                <p class="text-center text-xs text-[#B6B6B6]">{{ description }}</p>
            </div>
    </div>
    
    
</template>

<script>
    import {RouterLink} from 'vue-router'
    export default {
        name: "Category",
        props: {
            image: String,
            name: String,
            description: String,
            buy: String,
        },
        components: {
            RouterLink,
        }
    }
</script>