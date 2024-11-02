<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import SearchBanner from '@/components/SearchBanner.vue';
import { useRoute } from 'vue-router';
import { ref,onMounted,provide } from 'vue';

const route = useRoute();
const search = route.params.search;

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
        <template #slot1>
            <div>Slot 1</div>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate at laboriosam quasi nihil inventore aspernatur facere, minima, temporibus distinctio possimus alias ullam dolorem veritatis modi cum illum! Praesentium, reprehenderit provident debitis aut nam placeat perspiciatis totam minima quos eveniet officia iure adipisci eligendi voluptatum quia esse laudantium eius consequuntur. Quasi corrupti similique explicabo sunt, doloribus laboriosam. Magnam, quibusdam distinctio! Quibusdam, aut reprehenderit beatae amet repellendus impedit laudantium vitae ullam ipsum. Facere aut magnam est quis sunt itaque. Laboriosam ducimus repellendus quis sed repellat a quo, qui dolore non provident suscipit libero accusamus excepturi itaque iste officiis corporis magnam, totam praesentium!
            </p>
        </template>
        <h2>Foods on Your Search <a href="#" class="text-white">"{{ search }}"</a></h2>
       <template #slot3>
        <div>slot 3</div>
       </template>
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