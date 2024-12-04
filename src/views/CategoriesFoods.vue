<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import SearchBanner from '@/components/SearchBanner.vue';
import { useRoute } from 'vue-router';
import {computed, ref,onMounted } from 'vue';
import store from '@/store';

const route = useRoute();
const slug = route.params.slug;

const foodMenus = computed(() => store.state.foodMenus);
onMounted(() =>{
    if (!foodMenus.value.data){
        store.dispatch('foodMenus', "burgers");
    }
});
</script>

<template>
    <search-banner>
        <h2>Foods on <a href="#" class="text-white">"{{slug}}"</a></h2>
    </search-banner>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <template  v-for="{id,src,title,detail,price} in foodMenus.data">
                <FoodMenu 
                    :src="src"  
                    :title="title"
                    :detail="detail"
                    :id="id"
                    :price="price"
                />
            </template>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
</template>