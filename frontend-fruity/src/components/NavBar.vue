<template>
  <nav class="bg-green-900 text-white flex items-center justify-between px-6 py-3">
    <!-- Logo -->
    <div class="flex items-center space-x-1">
      <span class="text-yellow-400 font-bold text-xl">FRUTO</span>
      <span class="bg-gray-200 text-gray-900 font-semibold text-xl px-2 rounded">POLIS</span>
    </div>

    <!-- Barra de búsqueda -->
    <div class="relative w-full max-w-md mx-4">
      <input
        type="text"
        v-model="searchQuery"
        @input="onSearch"
        class="w-full pl-10 pr-4 py-2 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring focus:ring-yellow-400"
        placeholder="Buscar productos"
      />
      <span class="absolute left-3 top-2.5 text-gray-500">
        <i class="fas fa-search"></i>
      </span>
    </div>

    <!-- Íconos -->
    <div class="flex space-x-6 text-xl">
      <!-- Perfil -->
      <button title="Perfil">
        <i class="fas fa-user"></i>
      </button>
      <!-- Favoritos -->
      <button title="Favoritos">
        <i class="fas fa-heart"></i>
      </button>
      <!-- Carrito -->
      <button title="Carrito">
        <i class="fas fa-shopping-cart"></i>
      </button>
    </div>
  </nav>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';

export default defineComponent({
  name: 'NavBar',
  setup() {
    const searchQuery = ref('');

    const onSearch = () => {
      console.log('Search query:', searchQuery.value);
    };

    return {
      searchQuery,
      onSearch,
    };
  },
});
</script>
