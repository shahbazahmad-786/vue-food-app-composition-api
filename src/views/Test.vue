<template>
  <button @click="sum(2,5)">Click Me</button>
  <button @click="count++">Count++</button>
  <p>{{ count }}</p>
  <button @click="event">Event</button>
  <hr>
  <form @submit.prevent="submit">
    <input v-model.number="number" type="text" name="" id="">
    <input type="submit" value="Submit">
  </form>
  <hr>
  <p>{{ text }}</p>
  <div>Checked names: {{ checkedNames }}</div>

<input type="checkbox" id="jack" value="Jack" v-model="checkedNames" />
<label for="jack">Jack</label>

<input type="checkbox" id="john" value="John" v-model="checkedNames" />
<label for="john">John</label>

<input type="checkbox" id="mike" value="Mike" v-model="checkedNames" />
<label for="mike">Mike</label>
</template>

<script setup>
import { ref } from 'vue';

const count = ref(0);
const text = ref('');
const checkedNames = ref([]);

const sum = (a,b) => {
  console.log(a+b);
};

const event = (e) => {
  console.log(e.target);
};

const submit = () => {
  console.log('Form submitted.');
  console.log(text.value);
};
</script>
