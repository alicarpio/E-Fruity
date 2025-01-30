<script lang="ts" setup>
import { addToCart, removeFromCart } from '@/stores/useFruitsStore.ts'

const props = defineProps({
  productID: {
    type: Number,
    required: true,
  },
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
  quantity: {
    type: Number,
    required: true,
  },
})


const add = () => {
  addToCart(props.productID)
}


const remove = () => {
  removeFromCart(props.productID)
}



</script>

<template>
  <div class="flex items-center justify-between border-b border-gray-200 py-4">
    <!-- Imagen del Producto -->
    <div class="flex items-center space-x-4">
      <!--<img
        :src="props.productImage"
        alt="Rip fresh mangos"
        class="w-16 h-16 rounded-lg object-cover bg-yellow-100"
      />-->
      <div>
        <!-- Título -->
        <h3 class="text-lg font-semibold text-gray-800">{{ productName }}</h3>
        <!-- Precio y Descuento -->
        <div class="flex items-center space-x-2">
          <span class="text-xl font-bold text-gray-800"> {{ price }} </span>
        </div>
      </div>
    </div>

    <!-- Selector de Cantidad -->
    <div class="flex items-center space-x-2">
      <!-- Botón Disminuir -->
      <button
        class="px-2 py-1 bg-gray-200 rounded-l-lg text-gray-600 hover:bg-gray-300"
        @click="remove()"
      >
        -
      </button>

      <!-- Cantidad -->
      <div class="px-4 py-1 bg-gray-100 text-gray-700 font-semibold rounded-lg">
        {{ props.quantity }}KG
      </div>

      <!-- Botón Incrementar -->
      <button
        class="px-2 py-1 bg-gray-200 rounded-r-lg text-gray-600 hover:bg-gray-300"
        @click="add()"
      >
        +
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Opcional: Ajusta el estilo de los botones según tu preferencia */
button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>
