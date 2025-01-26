<script setup lang="ts">
defineProps({
  productImage: {
    type: String,
    required: true,
  },
  productName: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <div class="flex flex-col items-center">
    <h1>{{ productName }}</h1>
    <img
      :src="productImage"
      alt="Imagen del producto"
      class="w-110 h-110 object-cover rounded-lg shadow-md mb-4"
    />
  </div>
</template>
