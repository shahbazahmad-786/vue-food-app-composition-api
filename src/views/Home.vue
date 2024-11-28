<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import SearchArea from '@/components/SearchArea.vue';
import { onMounted, ref,provide, defineAsyncComponent, computed } from 'vue';
import store from '@/store';
import Loader from '@/components/Loader.vue';


const Foods = defineAsyncComponent(()=>
import('@/components/Foods.vue')
);


const foods = computed(() => store.state.foods);
const foodMenus = computed(() => store.state.foodMenus);

provide('message','web penter');

onMounted(() => {
  store.dispatch("foods");
  store.dispatch("foodMenus");
});
</script>

<template>
    <SearchArea/>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <template v-for="food in foods.data">
                <Foods :img="food.img" :title="food.title" :slug="food.slug"/>
            </template>

            <Loader v-if="foods.loading" style="margin-top: 80px;"/>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <template  v-for="{id,src,title,details,price} in foodMenus.data">
                <FoodMenu 
                    :src="src"  
                    :title="title"
                    :details="details"
                    :id="id"
                    :price="price"
                />
            </template>

            <Loader v-if="foodMenus.loading" style="margin-top: 80px;"/>

            <div class="clearfix"></div>

        </div>

        <p class="text-center" v-if="!foodMenus.loading">
            <router-link :to="{name:'Foods'}">See All Foods</router-link>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
</template>