<script setup>
const props = defineProps({
    src:String,
    title:String,
    details:String,
    id:Number,
    price:Number
});
</script>

<template>
    <div class="food-menu-box">
                <div class="food-menu-img">
                    <img :src="src" :alt="title" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4 style="text-transform: capitalize;">{{ title }}</h4>
                    <p class="food-price">${{ price }}</p>
                    <p class="food-detail">{{ details }}</p>
                    <br>

                    <router-link :to="{name:'Order',params:{id:id}}" class="btn btn-primary">Order Now</router-link>
                </div>
            </div>
</template>