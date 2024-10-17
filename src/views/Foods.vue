<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import SearchArea from '@/components/SearchArea.vue';

import { ref,onMounted } from 'vue';

const foodMenus = ref([]);

const fetchFoodMenus = async () => {
    try {
        const response = await fetch('../../db/food-menu.json');
        const data = await response.json();
        foodMenus.value = data;
    } catch (error) {
        console.log(error);
    }
};

onMounted(() => {
  fetchFoodMenus();
});
</script>

<template>
    <SearchArea/>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <template  v-for="{id,src,title,detail,price} in foodMenus">
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