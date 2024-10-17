<script setup>
const props = defineProps(['img','title','slug']);
</script>

<template>
    <router-link :to="{name:'CategoriesFoods',params:{slug:slug}}">
                <div class="box-3 float-container">
                    <img :src="`/images/${img}`" alt="Pizza" class="img-responsive img-curve">

                    <h3 class="float-text text-white">{{ title }}</h3>
                </div>
            </router-link>
</template>

