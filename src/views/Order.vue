<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const food = ref({});

const formData = ref({
  fullName: '',
  contact: '',
  email: '',
  address: '',
  qty: 1,
});

const fetchFoodById = async (id) => {
  try {
    const response = await fetch('../../db/food-menu.json'); 
    const foodMenus = await response.json();
    const selectedFood = foodMenus.find(item => item.id === id); 
    if (selectedFood) {
      food.value = selectedFood;
    }
  } catch (error) {
    console.log(error);
  }
};

// Handle form submission
const handleSubmit = (event) => {
  event.preventDefault();
  
  const orderData = {
    food: {
      title: food.value.title,
      price: food.value.price,
      image: food.value.src,
    },
    ...formData.value,
  };
  
  console.log('Order Data:', orderData); // Log order data in console
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

      <form @submit="handleSubmit" class="order">
        <fieldset>
          <legend>Selected Food</legend>

          <div class="food-menu-img">
            <img :src="`/images/${food.src}`" :alt="food.title" class="img-responsive img-curve" />
          </div>

          <div class="food-menu-desc">
            <h3>{{ food.title }}</h3>
            <p class="food-price">${{ food.price }}</p>

            <div class="order-label">Quantity</div>
            <input v-model="formData.qty" type="number" class="input-responsive" min="1" required />
          </div>
        </fieldset>

        <!-- Delivery Details -->
        <fieldset>
          <legend>Delivery Details</legend>

          <div class="order-label">Full Name</div>
          <input v-model="formData.fullName" type="text" placeholder="E.g. John Doe" class="input-responsive" required />

          <div class="order-label">Phone Number</div>
          <input v-model="formData.contact" type="tel" placeholder="E.g. 1234567890" class="input-responsive" required />

          <div class="order-label">Email</div>
          <input v-model="formData.email" type="email" placeholder="E.g. email@example.com" class="input-responsive" required />

          <div class="order-label">Address</div>
          <textarea v-model="formData.address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

          <input type="submit" value="Confirm Order" class="btn btn-primary" />
        </fieldset>
      </form>
    </div>
  </section>
</template>