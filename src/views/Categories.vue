<script setup>
import Foods from '@/components/Foods.vue';
import store from '@/store';
import Loader from '@/components/Loader.vue';

import { onMounted, computed } from 'vue';

const foods = computed(() => store.state.foods);

onMounted(() => store.dispatch("foods"));
</script>

<template>
    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <!-- Corrected v-for loop -->
            <template v-for="food in foods.data" :key="food.slug">
                <Foods :img="food.img" :title="food.title" :slug="food.slug"/>
            </template>

            <Loader v-if="foods.loading" style="margin-block: 100px;"/>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
</template>
