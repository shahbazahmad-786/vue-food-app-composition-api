<script setup>
import FoodMenu from '@/components/FoodMenu.vue';
import SearchBanner from '@/components/SearchBanner.vue';
import Loader from '@/components/Loader.vue';
import { useRoute } from 'vue-router';
import { onMounted,computed } from 'vue';
import store from '@/store';

const route = useRoute();
const slug = route.params.slug;

const foodMenus = computed(() => store.state.foodMenus);

onMounted(() => {
    store.dispatch("foodMenusByFood",slug);
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