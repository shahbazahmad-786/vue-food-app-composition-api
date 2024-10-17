<script setup>
import Foods from '@/components/Foods.vue';

import { ref,onMounted } from 'vue';

const foods = ref([]);

const fetchFoods = async () => {
    try {
        const response = await fetch('../../db/foods.json');
        const data = await response.json();
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
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <template v-for="{img,title,slug} in foods">
                <Foods :img="img" :title="title" :slug="slug"/>
            </template>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
</template>