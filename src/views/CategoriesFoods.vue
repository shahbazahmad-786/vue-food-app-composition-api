<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import SearchBanner from '@/components/SearchBanner.vue';
import { useRoute } from 'vue-router';
import { ref,onMounted } from 'vue';

const route = useRoute();
const slug = route.params.slug;

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
    <search-banner>
        <h2>Foods on <a href="#" class="text-white">"{{slug}}"</a></h2>
    </search-banner>

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