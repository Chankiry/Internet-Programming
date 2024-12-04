<template>
    <div v-if="buy === '1'">
        <RouterLink to="/page2"> 
            <div class="h-[300px] w-[512px] relative rounded-md shadow-md overflow-hidden ">
                <img class=" absolute  bottom-0 right-0" :src="image" >
                <div class="w-[271px] h-[141px] flex flex-col m-auto justify-between gap-6 absolute items-between left-10 top-14 ">
                <div class="">
                    <h2 class="font-semibold text-2xl text-black">{{description}}</h2>
                </div>
                <Button :class="bg" class="" ></Button>
                </div> 
            </div>   
        </RouterLink> 
    </div>   
    <div v-else >
        <div class="h-[300px] w-[512px] relative rounded-md shadow-md overflow-hidden ">
            <img class=" absolute  bottom-0 right-0" :src="image" >
            <div class="w-[271px] h-[141px] flex flex-col m-auto justify-between gap-6 absolute items-between left-10 top-14 ">
            <div class="">
                <h2 class="font-semibold text-2xl">{{description}}</h2>
            </div>
            <Button :class="bg" class="" ></Button>
            </div> 
        </div> 
    </div>
</template> 



<script>
    import { RouterLink} from 'vue-router'
    import Button from './button.vue';
    export default {
        name: "Promotion",
        props: {
            image: String,
            name: String,
            description: String,
            bg: String,
            buy: String,
        },
        components:{Button,RouterLink},
    }
</script>
