<template>
    <div class="flex flex-row  items-center justify-between mb-1">
        <h1 class="text-3xl font-semibold">{{title}}</h1>
        <div class="flex flex-row gap-5" >
            <h1 class="font-bold">All</h1>
            <h1 v-for="group in groups">{{ group }}</h1>
        </div>
        
    </div>
    
</template>

<script>
    import {useEStore} from '../stores/eStore';
    import {mapState} from 'pinia';

    export default{
        name: "menu",
        props: {
            title: String,
        },
        computed: {
            ...mapState(useEStore,['groups'])
        }
        
        
    }
    
    
    
</script>