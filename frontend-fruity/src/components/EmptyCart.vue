<script setup lang="ts">
import emptycart from '../assets/emptycart.png'
</script>
<template>
  <div class="flex flex-col justify-center items-center">
    <img :src="emptycart" alt="Carrito vacio" class="w-110 h-110 object-cover rounded-lg mb-4" />
    <h1 class="font-bold text-2xl">El carrito está vacio</h1>
    <p class="text-[#A1A1A1] text-sm">¿Por qué no pruebas algo de nuestra tienda?</p>
    <button class="font-bold bg-[#FFBE30] py-3 px-10 rounded-lg mt-10">Volver a comprar</button>
  </div>
</template>

<style scoped></style>
