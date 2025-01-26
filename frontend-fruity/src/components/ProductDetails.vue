<script setup lang="ts">
import { ref } from 'vue'
import Breadcrumb from '@/components/Breadcrumb.vue'

const quantity = ref(1)

const increaseQuantity = () => {
  quantity.value++
}

const decreaseQuantity = () => {
  if (quantity.value > 1) {
    quantity.value--
  }
}
</script>

<template>
  <section class="flex flex-col w-5/6">
    <Breadcrumb />
    <h1 class="text-2xl font-bold mt-12 mb-2">Mango Fresco Maduro</h1>
    <p class="text-xs text-[#B9BBBF]">Mango maduro fresco y completo</p>

    <div class="border-t border-gray-300 mb-5 mt-1"></div>

    <h3 class="text-xl text-[#3A4980] font-bold">$71.56</h3>

    <div class="border-t border-gray-300 my-6"></div>

    <div class="flex items-center space-x-10 w-full">
      <div class="flex items-center border border-gray-300 rounded-3xl bg-[#F3F3F3]">
        <button
          class="px-4 py-2 font-bold text-[#A3A3A3] hover:text-gray-500"
          @click="decreaseQuantity"
        >
          -
        </button>
        <span class="px-4 py-2 font-bold text-[#3A4980]"> {{ quantity }}KG </span>
        <button
          class="px-4 py-2 hover:text-blue-600 font-bold text-[#3A4980]"
          @click="increaseQuantity"
        >
          +
        </button>
      </div>
      <button
        class="px-20 py-3 text-white font-sm font-bold rounded-3xl shadow-md hover:bg-3A4980 bg-[#3A4980]"
        @click="addToCart"
      >
        <i class="fa fa-shopping-bag mr-2" aria-hidden="true"></i>
        Añadir al carrito
      </button>
    </div>
  </section>
</template>

<style scoped></style>
