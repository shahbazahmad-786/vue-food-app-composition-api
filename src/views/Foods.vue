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

    <!-- Food Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <!-- Corrected v-for loop -->
            <template v-for="foodMenu in foodMenus.data" :key="foodMenu.id">
                <FoodMenu 
                    :src="foodMenu.src"  
                    :title="foodMenu.title"
                    :details="foodMenu.details"
                    :id="foodMenu.id"
                    :price="foodMenu.price"
                />
            </template>

            <Loader v-if="foodMenus.loading" style="margin-top: 80px;"/>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Food Menu Section Ends Here -->
</template>
