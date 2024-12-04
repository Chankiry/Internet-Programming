<template>
    <div class="flex flex-col gap-5 w-[1500px]">
        <SearchBox></SearchBox>
        <Navbar></Navbar>
        <div class="flex flex-col justify-center items-start w-full h-[235px] bg-green-200 rounded-lg bg-[url('../assets/figure.png')]">
            <div class="ml-10">
                <p class="text-5xl">Coke & Milk</p>
                <p class="text-xl opacity-50 mt-5">Home > Category > Coke & Milk</p>
            </div>
            
        </div>
        <div class="w-full h-[400px]"></div>
    </div>
</template>

<script>
    import SearchBox from '../components/SearchBox.vue'
    import Navbar from '../components/Navbar.vue'


    export default {
        name: 'HotView',
        components:{
            SearchBox,
            Navbar,
        }
    }

</script>
