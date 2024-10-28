<script setup>
import Foods from '@/components/Foods.vue';
import FoodMenu from '@/components/FoodMenu.vue';
import SearchArea from '@/components/SearchArea.vue';
import { onMounted, ref } from 'vue';
import store from '@/store';

const foods = ref([]);
const foodMenus = ref([]);

const fetchFoods = async () => {
   try {
        const response = await fetch('../../db/foods.json');
        const data = await response.json();
        foods.value = data;
   } catch (error) {
        console.log(error);
   }
};

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
  fetchFoods();
  fetchFoodMenus();
});
</script>

<template>
    <SearchArea/>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <template v-for="food in foods">
                <Foods :img="food.img" :title="food.title" :slug="food.slug"/>
            </template>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

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

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
</template>