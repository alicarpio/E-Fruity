<script setup lang="ts">
import {useFruits} from '@/stores/useFruitsStore.ts'

const fruits = useFruits()

// lista global de frutas
const listFruits = fruits.data || []

// Cantidad de productos en el carrito recrre la lista y suma la cantidad de cada producto
const cartCount = () => {
  return listFruits.value.reduce((acc, item) => acc + item.quantity, 0)
}


</script>

<template>
  <div class="relative">
    <!-- Enlace al carrito -->
    <router-link to="/shopping-cart" title="Carrito" class="text-white hover:text-yellow-400">
      <i class="fas fa-shopping-cart text-xl"></i>
    </router-link>

    <!-- Círculo para mostrar el número de productos -->
    <div
      v-if="cartCount() > 0"
      class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full"
    >
      {{ cartCount }}
    </div>
  </div>
</template>

<style scoped>
/* Ajustes para el ícono del carrito */
.text-xl {
  font-size: 1.25rem;
}
</style>
