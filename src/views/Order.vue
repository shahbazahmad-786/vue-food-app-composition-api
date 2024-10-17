<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const food = ref({}); // This will hold the selected food data

const fetchFoodById = async (id) => {
    try {
        const response = await fetch('../../db/food-menu.json'); // Assuming your food data is in this file
        const foodMenus = await response.json();
        // Find the selected food by its ID
        const selectedFood = foodMenus.find(item => item.id === id);
        if (selectedFood) {
            food.value = selectedFood;
        }
    } catch (error) {
        console.log(error);
    }
};

// Form data
const formData = ref({
    qty: 1,
    fullName: '',
    contact: '',
    email: '',
    address: ''
});

const handleSubmit = () => {
    alert('Form Submitted!'); // Add alert for testing
    console.log('Form Data:', {
        selectedFood: food.value,
        quantity: formData.value.qty,
        fullName: formData.value.fullName,
        contact: formData.value.contact,
        email: formData.value.email,
        address: formData.value.address
    });
};

onMounted(() => {
    const { id } = route.params;
    fetchFoodById(Number(id)); // Fetch food by ID from the route param
});
</script>

<template>
    <section class="food-search">
        <div class="container">
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form @submit.prevent="handleSubmit" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <!-- Dynamically display the image --> 
                        <img :src="`/images/${food.src}`" :alt="food.title" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3>{{ food.title }}</h3>
                        <p class="food-price">${{ food.price }}</p>

                        <div class="order-label">Quantity</div>
                        <input type="number" v-model="formData.qty" name="qty" class="input-responsive" required>
                    </div>
                </fieldset>

                <!-- Delivery Details -->
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" v-model="formData.fullName" name="full-name" placeholder="E.g. John Doe" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" v-model="formData.contact" name="contact" placeholder="E.g. 1234567890" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" v-model="formData.email" name="email" placeholder="E.g. email@example.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea v-model="formData.address" name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
</template>