<template>
  <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-4">
    <!-- Ícono de Favorito -->
    <div class="flex justify-end">
      <button
        class="text-gray-400 hover:text-red-500"
        @click="toggleFavorite"
        :aria-label="isFavorite ? 'Eliminar de favoritos' : 'Agregar a favoritos'"
      >
        <i :class="[isFavorite ? 'fas fa-heart' : 'far fa-heart']"></i>
      </button>
    </div>

    <!-- Imagen del Producto -->
    <img
      src="/src/assets/cherry.png"
      alt="Fresh Ripe Mango"
      class="w-full h-48 object-cover rounded-lg"
    />

    <!-- Información del Producto -->
    <div class="mt-4 text-center">
      <h2 class="text-xl font-bold">Fresh Ripe Mango</h2>
      <!-- Estrellas de Calificación -->
      <div class="flex items-center justify-center mt-1">
        <div class="flex text-yellow-400">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <span class="text-sm text-gray-500 ml-2">(1)</span>
      </div>

      <!-- Precio -->
      <div class="flex items-center justify-center mt-3">
        <span class="text-2xl font-bold text-gray-800">145.00 $</span>
      </div>

      <!-- Opciones de Producto -->
      <div class="mt-4 grid grid-cols-2 gap-4">
        <!-- Selector de Talla -->
        <div>
          <label for="size" class="block text-sm font-medium text-gray-700">Size:</label>
          <select
            id="size"
            class="w-full mt-1 border-gray-300 rounded-lg focus:ring-yellow-400 focus:border-yellow-400"
            v-model="selectedSize"
          >
            <option v-for="size in sizes" :key="size" :value="size">{{ size }}</option>
          </select>
        </div>

        <!-- Cantidad -->
        <div>
          <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
          <div class="flex items-center mt-1">
            <button
              class="px-2 py-1 border border-gray-300 rounded-l-lg bg-gray-100 hover:bg-gray-200"
              @click="decreaseQuantity"
            >
              -
            </button>
            <input
              id="quantity"
              type="text"
              class="w-12 text-center border-t border-b border-gray-300 focus:outline-none"
              v-model.number="quantity"
            />
            <button
              class="px-2 py-1 border border-gray-300 rounded-r-lg bg-gray-100 hover:bg-gray-200"
              @click="increaseQuantity"
            >
              +
            </button>
          </div>
        </div>
      </div>

      <!-- Botón Agregar al Carro -->
      <button
        class="mt-6 w-full bg-yellow-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-500"
        @click="addToCart"
      >
        Agregar al carro
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';

export default defineComponent({
  name: 'ProductComponent',
  setup() {
    // Estados Reactivos
    const isFavorite = ref(false); // Favorito
    const selectedSize = ref('1 Kg'); // Talla seleccionada
    const quantity = ref(1); // Cantidad seleccionada
    const sizes = ref(['1 Kg', '500 g', '250 g']); // Opciones de tamaños

    // Métodos
    const toggleFavorite = () => {
      isFavorite.value = !isFavorite.value;
    };

    const decreaseQuantity = () => {
      if (quantity.value > 1) {
        quantity.value -= 1;
      }
    };

    const increaseQuantity = () => {
      quantity.value += 1;
    };

    const addToCart = () => {
      console.log(`Añadido al carrito: ${quantity.value} x ${selectedSize.value}`);
    };

    return {
      isFavorite,
      selectedSize,
      quantity,
      sizes,
      toggleFavorite,
      decreaseQuantity,
      increaseQuantity,
      addToCart,
    };
  },
});
</script>

<style scoped>
/* Estilo para sobrescribir bordes */
input[type='text']::-webkit-inner-spin-button,
input[type='text']::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
