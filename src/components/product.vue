<template>
    <div class="flex flex-col w-[298px] h-[402px] bg-white border-[1px] rounded-lg">
        <div class="flex relative top-[20px] w-[58px] h-[32px] bg-green-400 text-white justify-center items-center rounded-r-full" :style="'background-color: ' + color">{{ tag}}</div>
        <img class="relative top-[35px] left-[42px] w-[201px] h-[144px]" :src="image" :alt="image">
        <div class="mt-14 ml-[15px]">
            <p class="text-[12px]">Fudo food</p>
            <p class="font font-bold text-[14px] w-[261px] h-[49px]">{{ name }}</p>
            <div class="flex flex-row mt-1 w-[11px] h-[11px]">
                <fa icon="star" style="color: #e2c718;" ></fa>
                <fa icon="star" style="color: #e2c718;" ></fa>
                <fa icon="star" style="color: #e2c718;" ></fa>
                <fa icon="star" style="color: #e2c718;" ></fa>
                <fa icon="star" style="color: #dbdbdb;" />
                <p class="relative bottom-1 opacity-50 ml-1">{{rate}}</p>
            </div>
            <p class="mt-[5px] text-[12px] text-gray-400">{{ description}}</p>
        </div>
        <div class="flex flex-row ml-[15px] mt-5 justify-between">
            <div class="flex">
                <p class="text-green-400 text-2xl">{{ discountPrice}}</p>
                <p class="mt-2 ml-2 line-through">{{ cost }}</p>
            </div>
            <div class="w-[67px] h-[29px] flex mr-3 rounded-lg border-green-300 border justify-evenly " v-if="buy === '1'">
                <div class="text-green-300">1</div>
                <div class="flex flex-col justify-around my-1">
                    <fa icon="chevron-up" class="text-green-300  text-[12px]" />
                    <fa icon="chevron-down" class="text-green-300 text-[12px]" />
                </div>
            </div>
            <div class="w-[67px] h-[29px] flex mr-3 rounded-lg bg-green-100 justify-evenly items-center text-green-300" v-else>
                <p class="text-sm">Add</p>
                <fa icon="plus" class="text-[12px]" />
            </div>
        </div> 
    </div>
</template>
<script>
    export default {
        name: "Product",
        props: {
            image: String,
            name: String,
            description: String,
            tag: String,
            kg: String,
            discountPrice: String,
            rate: String,
            cost: String,
            color: String,
            bg1: String,
            buy: String,
        },
    }

</script>
