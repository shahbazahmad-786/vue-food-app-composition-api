<script setup>
import Foods from '@/components/Foods.vue';
import FoodMenu from '@/components/FoodMenu.vue';
import SearchArea from '@/components/SearchArea.vue';
import { onMounted, ref } from 'vue';

const foods = ref([]);

const fetchFoods = async () => {
   try {
        const response = await fetch('../../db/foods.json');
        const data = await response.json();
        // console.log(data);
        foods.value = data;
   } catch (error) {
        console.log(error);
   }
};

onMounted(() => {
  fetchFoods();
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

            <FoodMenu 
                src="menu-pizza.jpg"  
                title="Food Title"
                detail=" Made with Italian Sauce, Chicken, and organice vegetables."
                :id="1"
                :price="2.3"
            />
            <FoodMenu 
                src="menu-burger.jpg"  
                title="Smoky Burger"
                detail=" Made with Italian Sauce, Chicken, and organice vegetables."
                :id="2"
                :price="2.3"
            />
            <FoodMenu 
                src="menu-burger.jpg"  
                title="Food Title"
                detail=" Made with Italian Sauce, Chicken, and organice vegetables."
                :id="3"
                :price="2.6"
            />
            <FoodMenu 
                src="menu-pizza.jpg"  
                title="Food Title"
                detail=" Made with Italian Sauce, Chicken, and organice vegetables."
                :id="4"
                :price="4.3"
            />
            <FoodMenu 
                src="menu-burger.jpg"  
                title="Food Title"
                detail=" Made with Italian Sauce, Chicken, and organice vegetables."
                :id="5"
                :price="2.3"
            />
            <FoodMenu 
                src="menu-pizza.jpg"  
                title="Food Title"
                detail=" Made with Italian Sauce, Chicken, and organice vegetables."
                :id="6"
                :price="2.5"
            />

            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
</template>