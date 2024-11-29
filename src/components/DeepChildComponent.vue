<template>
  <div>
    <!-- {{ text }} -->
  </div>
</template>

<script setup>
import { inject } from "vue";

const text = inject('message');
</script>