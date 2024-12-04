<template>
  <!-- fOOD sEARCH Section Starts Here -->
  <section class="food-search text-center">
        <div class="container">

            <form @submit.prevent="submit">
                <input v-model="search" v-focus type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
</template>

<script setup>
import router from '@/router';
import { ref } from 'vue';

const search = ref('');

const submit = () => {
    router.push({name:'FoodSearch',params:{search:search.value}});
};

const vFocus = {
    mounted: (e) => e.focus()
}
</script>
