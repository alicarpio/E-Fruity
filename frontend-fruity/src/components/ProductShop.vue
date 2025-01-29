<template>
  <div class="flex items-center justify-between border-b border-gray-200 py-4">
    <!-- Imagen del Producto -->
    <div class="flex items-center space-x-4">
      <img
        src="/src/assets/cherry.png"
        alt="Rip fresh mangos"
        class="w-16 h-16 rounded-lg object-cover bg-yellow-100"
      />
      <div>
        <!-- Título -->
        <h3 class="text-lg font-semibold text-gray-800">Rip fresh cherry</h3>
        <!-- Precio y Descuento -->
        <div class="flex items-center space-x-2">
          <span class="text-xl font-bold text-gray-800">$400</span>
        </div>
      </div>
    </div>

    <!-- Selector de Cantidad -->
    <div class="flex items-center space-x-2">
      <!-- Botón Disminuir -->
      <button
        class="px-2 py-1 bg-gray-200 rounded-l-lg text-gray-600 hover:bg-gray-300"
        @click="decreaseQuantity"
        :disabled="quantity === 1"
      >
        -
      </button>
      <!-- Cantidad -->
      <div class="px-4 py-1 bg-gray-100 text-gray-700 font-semibold rounded-lg">
        {{ quantity }}KG
      </div>
      <!-- Botón Incrementar -->
      <button
        class="px-2 py-1 bg-gray-200 rounded-r-lg text-gray-600 hover:bg-gray-300"
        @click="increaseQuantity"
      >
        +
      </button>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';

export default defineComponent({
  name: 'ProductShop',
  setup() {
    // Cantidad seleccionada
    const quantity = ref(1);

    // Métodos para aumentar y disminuir la cantidad
    const increaseQuantity = () => {
      quantity.value += 1;
    };

    const decreaseQuantity = () => {
      if (quantity.value > 1) {
        quantity.value -= 1;
      }
    };

    return {
      quantity,
      increaseQuantity,
      decreaseQuantity,
    };
  },
});
</script>

<style scoped>
/* Opcional: Ajusta el estilo de los botones según tu preferencia */
button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>
