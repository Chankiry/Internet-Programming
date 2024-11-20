<template>
  <div class=" flex flex-col gap-4 m-auto">
    <Menu title="Fearture Category"></Menu>
    <div className="flex gap-[23px]">
      <!-- <Category :class="fruit.bg" v-for="(fruit, index) in fruits" :key="index" :image="fruit.imageUrl" :name="fruit.name" :description="fruit.description" /> -->
      <Category :class="category.bg" v-for="category in categories"  :image="category.imageUrl" :name="category.name" :description="category.description" />
    </div>
    <div class="flex gap-4">
      <Promotion :class="promotion.color" v-for="promotion in prom" :image="promotion.image" :description="promotion.title" :bg="promotion.bg"></Promotion>
    </div>
    <Menu title="Fearture Category"></Menu>
    <div class="flex flex-col ">
      <div class="flex flex-row gap-[20px]">
        <Product v-for="product in products" :image= "product.image" :name="product.name" :tag="product.tag" 
              :rate="product.rate" :description="product.description" :discountPrice="product.discountPrice"
              :cost="product.sellPrice" :buy="product.buy" :color="product.color">
      </Product>
      </div>
      <div class="flex flex-row gap-[20px] mt-[10px]">
        <Product v-for="product in products2" :image= "product.image" :name="product.name" :tag="product.tag" 
              :rate="product.rate" :description="product.description" :discountPrice="product.discountPrice"
              :cost="product.sellPrice" :buy="product.buy" :color="product.color">
      </Product>
      </div>
      
    </div>
    
  </div>
</template>



<script>
  import {useEStore} from './stores/eStore'
  import {mapState} from 'pinia'


  import Product from './components/product.vue'
  import Category from './components/Category.vue'
  import Promotion from './components/Promotion.vue'
  import Menu from './components/menu.vue'

  

  export default {
    name: "app",
    components: {
      Promotion,
      Menu,
      Category,
      Product,
    },
    computed: {
      ...mapState(useEStore,['prom']),
      ...mapState(useEStore,['categories']),
      ...mapState(useEStore,['products']),
      ...mapState(useEStore,['products2'])
    },
    
  }
   
</script>