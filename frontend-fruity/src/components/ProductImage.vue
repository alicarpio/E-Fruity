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
    <h1 class="mr-96 mb-5 text-3xl font-bold text-[#7f7f7f]">{{ productName }}</h1>
    <img
      :src="productImage"
      alt="Imagen del producto"
      class="w-110 h-110 object-contain rounded-lg shadow-md mb-4"
    />
  </div>
</template>
