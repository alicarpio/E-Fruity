<script setup lang="ts">
import { ref } from 'vue'

// Props
defineProps({
  productName: {
    type: String,
    required: true,
  },
  productImage: {
    type: String,
    required: true,
  },
  price: {
    type: Number,
    required: true,
  },
})

// Estado y métodos
const isFavorite = ref(false)
const selectedSize = ref('1 Kg')
const quantity = ref(1)
const sizes = ref(['1 Kg', '500 g', '250 g'])

const toggleFavorite = () => {
  isFavorite.value = !isFavorite.value
}

const decreaseQuantity = () => {
  if (quantity.value > 1) {
    quantity.value -= 1
  }
}

const increaseQuantity = () => {
  quantity.value += 1
}

const addToCart = () => {
  console.log(`Añadido al carrito: ${quantity.value} x ${selectedSize.value}`)
}
</script>

<template>
  <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-4">
    <!-- Ícono de Favorito -->
    <div class="flex justify-end">
      <button
        class="text-gray-400 hover:text-red-500"
        @click="toggleFavorite"
        :aria-label="isFavorite ? 'Eliminar de favoritos' : 'Agregar a favoritos'"
      >
        <i :class="isFavorite ? 'fas fa-heart text-red-500' : 'far fa-heart'"></i>
      </button>
    </div>

    <!-- Imagen del Producto -->
    <img :src="productImage" :alt="productName" class="w-full h-48 object-cover rounded-lg" />

    <!-- Información del Producto -->
    <div class="mt-4 text-center">
      <h2 class="text-xl font-bold">{{ productName }}</h2>

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
        <span class="text-2xl font-bold text-gray-800">{{ price }} $</span>
      </div>

      <!-- Opciones de Producto -->
      <div class="mt-4 grid grid-cols-2 gap-4">
        <!-- Selector de Talla -->
        <div>
          <label for="size" class="block text-sm font-medium text-gray-700">Tamaño:</label>
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
          <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad:</label>
          <div class="flex items-center mt-1">
            <button
              class="px-2 py-1 border border-gray-300 rounded-l-lg bg-gray-100 hover:bg-gray-200"
              @click="decreaseQuantity"
              :disabled="quantity <= 1"
            >
              -
            </button>
            <input
              id="quantity"
              type="number"
              class="w-12 text-center border-t border-b border-gray-300 focus:outline-none"
              v-model.number="quantity"
              min="1"
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
        Agregar al carrito
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Sobrescribir el estilo para los botones de número */
input[type='number']::-webkit-inner-spin-button,
input[type='number']::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
