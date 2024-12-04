<script setup>
</script>


<template>
  <div style="display: flex;justify-content: center;align-items: center;gap: 10px;">
    <div class="loader"></div>
    <div style="text-align: center;font-size: 25px;">Loading...</div>
  </div>
</template>

<style scoped>
.loader {
  border: 3px solid #f3f3f3;
  border-top: 3px solid gray;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 0.5s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>