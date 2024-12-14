<template>
    <section class="food-search">
        <div class="container">
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            <form @submit.prevent="submitOrder" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
                    <div class="food-menu-img">
                        <img :src="src" alt="Food Image" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h3>{{ title }}</h3>
                        <p class="food-price">${{ totalPrice.toFixed(2) }}</p>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" v-model="quantity" min="1" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="name" v-model="fullName" placeholder="E.g. Vijay Thapa" class="input-responsive" required>
                    
                    <div class="order-label">Phone Number</div>
                    <input type="tel" v-model="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>
                    
                    <div class="order-label">Email</div>
                    <input type="email" name="email" v-model="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>
                    
                    <div class="order-label">Address</div>
                    <textarea v-model="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    
                    <input type="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";

const route = useRoute();
const store = useStore();

const user = computed(() => store.state.user.data);

const { id } = route.params;
const { title, price, src } = route.query;

const quantity = ref(1);
const fullName = ref(user.value?.name || "");
const contact = ref("");
const email = ref(user.value?.email || "");
const address = ref("");

const totalPrice = computed(() => quantity.value * Number(price));

const submitOrder = () => {
    const orderData = {
        food_menue_id: id,
        quantity: quantity.value,
        total_price: totalPrice.value,
        full_name: fullName.value,  // Ensure full_name is passed
        contact: contact.value,
        email: email.value,
        address: address.value,
    };

    store.dispatch("submitOrder", orderData);
};
</script>

<style scoped>
/* Add custom styles for the order page here */
</style>
