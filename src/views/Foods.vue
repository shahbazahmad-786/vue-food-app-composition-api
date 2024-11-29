<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import Loader from '@/components/Loader.vue';
import SearchArea from '@/components/SearchArea.vue';
import store from '@/store';

import { onMounted, computed } from 'vue';

const foodMenus = computed(() => store.state.foodMenus);

onMounted(() => store.dispatch("foodMenus"));
</script>

<template>
    <SearchArea/>

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

    </section>
    <!-- fOOD Menu Section Ends Here -->
</template>