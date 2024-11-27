<script setup>
import Foods from '@/components/Foods.vue';
import store from '@/store';
import Loader from '@/components/Loader.vue';

import { ref,onMounted, computed } from 'vue';

const foods = computed(() => store.state.foods)

onMounted(() => store.dispatch("foods"));
</script>

<template>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <template v-for="{img,title,slug} in foods.data">
                <Foods :img="img" :title="title" :slug="slug"/>
            </template>

            <Loader v-if="foods.loading" style="margin-block: 100px;"/>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
</template>