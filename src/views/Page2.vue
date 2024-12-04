<template>
    <div class="flex flex-col gap-5 w-[1500px]">
        <SearchBox></SearchBox>
        <Navbar></Navbar>
        <p class="opacity-70">Home><span class="ml-2">Vegetable & tuber ></span> <span class="text-green-400 ml-2">Seeds of Change Organic</span></p>
        <div class="flex flex-row">
            <div class="w-[120%] h-[635px] rounded-lg border-[1px] border-gray-300">
                <fa icon="magnifying-glass" class="relative top-5 left-[95%]"/>
                <div class="relative top-[20%] left-3 w-[96%] h-[55%] ">
                    <img src="../assets/18 1.png" alt="" class="object-cover h-[100%] w-full border-[1px] border-blue-500 rounded-lg">
                </div>      
            </div>
            <div class="flex flex-col ml-16 gap-10">
                <div class="flex items-center justify-center w-[100px] h-[30px] bg-green-400 rounded-lg"> In Stock</div>
                <p class="text-5xl">Seeds of Change Organic Quinoa, Brown</p>
                <div class="flex flex-row mt-1 w-[11px] h-[11px]">
                    <fa icon="star" style="color: #e2c718;" ></fa>
                    <fa icon="star" style="color: #e2c718;" ></fa>
                    <fa icon="star" style="color: #e2c718;" ></fa>
                    <fa icon="star" style="color: #e2c718;" ></fa>
                    <fa icon="star" style="color: #dbdbdb;" />
                    <p class="relative bottom-1 opacity-50 ml-1">(4.0)</p>
                </div>
                <div class="flex flex-row gap-16">
                    <p class="text-5xl text-green-400">$38</p>
                    <p class="text-3xl line-through mt-3 opacity-50">$42</p>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!</p>
                <div class="flex flex-row gap-3">
                    <div class="w-[100px] h-[50px] flex rounded-lg border-green-300 border justify-evenly items-center">
                        <div class="text-green-300">1</div>
                        <div class="flex flex-col justify-around my-1">
                            <fa icon="chevron-up" class="text-green-300  text-[12px]" />
                            <fa icon="chevron-down" class="text-green-300 text-[12px]" />
                        </div>
                    </div>
                    <div class="w-[200px] h-[50px] flex rounded-lg bg-green-400 border justify-evenly items-center">
                        <fa icon="cart-shopping" class="text-white"/>
                        <p class="text-white">Add to Cart</p>
                    </div>
                    <div class="flex w-[50px] h-[50px] rounded-lg border-[1px] border-gray-200 justify-center items-center">
                        <fa icon="heart" style="color: gainsboro;" />
                    </div>
                    <div class="flex w-[50px] h-[50px] rounded-lg border-[1px] border-gray-200 justify-center items-center">
                        <fa icon="shuffle" />
                    </div>
                </div>
                <p>Vendor:<span class="ml-5 opacity-70">NestMart</span></p>
                <p>SKU:<span class="ml-5 opacity-70">FWM15Vkt</span></p>
                
            </div>
        </div>
        <div class="flex flex-row gap-5 items-center">
            <div class="flex justify-center items-center w-[50px] h-[30px] bg-green-400 rounded-full"><fa icon="arrow-left" class="text-white" /></div>
            <div class="w-[100px] h-[100px] rounded-lg ">
                <img src="../assets/2.png" alt="" class="h-full border-[1px] border-green-500 rounded-lg">
            </div>
            <div class="flex items-center justify-center w-[100px] h-[100px] rounded-lg border-[1px] border-gray-100">
                <img src="../assets/zppb2xd1 1.png" alt="" class="h-[80%]  rounded-lg">
            </div>
            <div class="flex items-center justify-center w-[100px] h-[100px] rounded-lg border-[1px] border-gray-100">
                <img src="../assets/6 1.png" alt="" class="h-[80%]  rounded-lg">
            </div>
            <div class="flex items-center justify-center w-[100px] h-[100px] rounded-lg border-[1px] border-gray-100">
                <img src="../assets/7 1.png" alt="" class="h-[80%]  rounded-lg">
            </div>
            <div class="flex justify-center items-center w-[40px] h-[30px] bg-gray-300 rounded-full"><fa icon="arrow-right"  /></div>
        </div>
        <div class="flex flex-col w-full h-[324px] border-[1px] border-gray-200 rounded-lg">
            <div class="flex flex-row m-16 gap-10">
                <div class="flex w-[158px] h-[45px] border-[1px] border-gray-200 justify-center items-center text-green-600 rounded-lg">Description</div>
                <div class="flex w-[158px] h-[45px] border-[1px] border-gray-200 justify-center items-center rounded-lg opacity-70">Additional info</div>
                <div class="flex w-[158px] h-[45px] border-[1px] border-gray-200 justify-center items-center rounded-lg opacity-70">Reviews(3)</div>
            </div>
            <p class="ml-16">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem tenetur delectus officia fugiat, enim corrupti sed, saepe labore laborum incidunt aliquid error architecto libero, tempora cumque consequuntur reprehenderit distinctio eaque ad similique porro quasi dolorem est! Voluptas dolores tempore velit illum minima numquam odio maxime qui laudantium? Voluptatibus, sapiente! Ut.</p>
        </div>
        <div class="w-full h-[300px]"></div>
        
    </div>
</template>

<script>
    import SearchBox from '../components/SearchBox.vue'
    import Navbar from '../components/Navbar.vue'
    import { useEStore } from '../stores/eStore';
    import { mapState } from 'pinia';


    export default {
        name: 'HotView',
        components:{
            SearchBox,
            Navbar,
        },
        computed:{
             ...mapState(useEStore,['products'])
        },
    }

</script>
