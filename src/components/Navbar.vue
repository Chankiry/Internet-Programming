<template>
    <div class="flex flex-row mt-5 justify-between">
        <div class="flex flex-row w-[250px] h-[44px] bg-green-400 rounded-lg justify-evenly items-center">
            <fa icon="border-all" class="text-2xl text-white"/>
            <p class="text-white">Browse All Categories</p>
            <fa icon="chevron-down" class="text-white cursor-pointer"/>

            
        </div>
        <div class="flex flex-row justify-center items-center ml-10 gap-10">
            <div class="flex flex-row items-center gap-3">
                <fa icon="fire" class="h-[30px] text-green-300"/>
                <RouterLink :to="{ name: 'HotDeal' }">Hot Deals</RouterLink>
            </div>     
            <RouterLink :to="{ name: 'home' }">Home</RouterLink>
            <p>Food<fa icon="chevron-down" class="w-[10px] ml-2 cursor-pointer"/></p>
            <p>Vegetable<fa icon="chevron-down" class="w-[10px] ml-2 cursor-pointer"/></p>
            <p>Drink</p>
            <p>Cookie</p>
            <p>Meat & Seafood<fa icon="chevron-down" class="w-[10px] ml-2 cursor-pointer"/></p>
            <p>Bakery</p>
        </div>
        <div class="flex flex-row gap-5">
            <fa icon="headset" class="text-5xl text-green-300"/>
            <div class="flex flex-col">
                <p class="text-green-300 text-2xl">099 777 888</p>
                <h1>24/7 Support Center</h1>
            </div>
        </div>
    </div>
</template>


<script>
import { RouterLink } from 'vue-router'

export default {
        components: {
            RouterLink
        },
        methods: {
            navigateTo(to) {
            this.$router.push(to);
            },
        },
    }

</script>