<script setup>
import Foods from '@/components/Foods.vue';
import FoodMenu from '@/components/FoodMenu.vue';
import SearchArea from '@/components/SearchArea.vue';
import { onMounted, computed, ref, provide } from 'vue';
import { useStore } from 'vuex'; // Use the Vuex store

const store = useStore(); // Use the Vuex store instance

// Fetch foods from Vuex store when the component is mounted
onMounted(() => {
  store.dispatch('foods'); // Trigger the foods action to fetch data
});

// Map the foods state from Vuex to a computed property
const foods = computed(() => store.state.foods.data);

const foodMenus = ref([]); // Local state for food menus

provide('message', 'web penter'); // Provide message

// Fetch food menus from a local JSON file
const fetchFoodMenus = async () => {
  try {
    const response = await fetch('../../db/food-menu.json');
    const data = await response.json();
    foodMenus.value = data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  fetchFoodMenus();
});
</script>

<template>
  <SearchArea/>

  <!-- Categories Section Starts Here -->
  <section class="categories">
    <div class="container">
      <h2 class="text-center">Explore Foods</h2>

      <!-- Loop through foods and pass props to Foods component -->
      <template v-for="food in foods" :key="food.id">
        <Foods :img="food.img" :title="food.title" :slug="food.slug" />
      </template>

      <div class="clearfix"></div>
    </div>
  </section>
  <!-- Categories Section Ends Here -->

  <!-- Food Menu Section Starts Here -->
  <section class="food-menu">
    <div class="container">
      <h2 class="text-center">Food Menu</h2>

      <template v-for="{ id, src, title, detail, price } in foodMenus" :key="id">
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
  <!-- Food Menu Section Ends Here -->
</template>