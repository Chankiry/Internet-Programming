<template>
    <div v-for="Picture in Logo" class="flex flex-row  items-center justify-between">
        <img :src="Picture.image" alt="">
        <div class="flex flex-row w-[700px] h-[50px] bg-gray-50 rounded-lg justify-between items-center ml-20 border-[1px] border-emerald-200">
            <div class="flex flex-row gap-5 ml-5">
                <p>All Category</p>
                <div><fa icon="chevron-down" /></div>
                <div class="w-[2px] h-80% bg-gray-200"></div>
                <input type="text" placeholder="Search for items" class="outline-none">
            </div>
            <div class="mr-5"><fa icon="magnifying-glass" /></div>     
        </div>
        <div class="flex flex-row gap-5">
            <div class="flex flex-row">
                <fa icon="user" class="h-[20px]"/>
                <p class="ml-2">Account</p>
            </div>
            <div class="flex flex-row">
                <fa icon="rotate" class="h-[20px]"/>
                <p class="ml-2">Compare</p>
            </div>
            <div class="flex flex-row">
                <fa icon="heart" class="h-[20px]"/>
                <p class="ml-2">Whislist</p>
            </div>
            <div class="flex flex-row">
                <fa icon="cart-shopping" class="h-[20px]"/>
                <p class="ml-2">Cart</p>
            </div>
        </div>  
    </div>
</template>

<script>
    import { useLogo } from '../stores/eStore2';
    import { mapState } from 'pinia';

    export default {
        name: "logo",
        computed:{
             ...mapState(useLogo,['Logo'])
        },
    }
</script>