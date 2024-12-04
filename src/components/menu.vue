<template>
    <div class="flex flex-row  items-center justify-between mb-1">
        <h1 class="text-3xl font-semibold">{{title}}</h1>
        <div class="flex flex-row gap-5" >
            <h1 class="font-bold">All</h1>
            <h1 class="">Milk & Daries</h1>
            <h1 class="">Coffees & Teas</h1>
            <h1 class="">Pet Foods</h1>
            <h1 class="">Meats</h1>
            <h1 class="">Vegetable</h1>
            <h1 class="">Fruits</h1>
        </div>
        
    </div>
    
</template>

<script>
    export default{
        props: {
            title: String,
        },  
    }

    
    
</script>