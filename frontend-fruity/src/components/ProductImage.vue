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
    <h1 class="text-4xl font-bold mb-3 mr-[19.2rem] text-[#7f7f7f]">{{ productName }}</h1>
    <img
      :src="productImage"
      alt="Imagen del producto"
      class="w-110 h-110 object-cover rounded-lg shadow-md mb-4"
    />
  </div>
</template>
