<script setup lang="ts">
import { ref } from 'vue'
import Breadcrumb from '@/components/Breadcrumb.vue'
import { addToCart } from '@/stores/useFruitsStore';
import sweetAlert from 'sweetalert2'

const props = defineProps({
  productID: {
    type: Number,
    required: true,
  },
  productName: {
    type: String,
    required: true,
  },
  price: {
    type: Number,
    required: true,
  },
  category: {
    type: String,
    required: true,
  },

})

const add = () => {
  addToCart(props.productID)
  sweetAlert.fire({
    icon: 'success',
    title: 'Producto añadido al carrito',
    showConfirmButton: false,
    timer: 1500
  })
}
</script>

<template>
  <section class="flex flex-col w-5/6">
    <Breadcrumb :product-name="productName" />
    <h1 class="text-2xl font-bold mt-12 mb-2">{{ productName }}</h1>
    <p class="text-xs text-[#B9BBBF]">{{ category }}</p>

    <div class="border-t border-gray-300 mb-5 mt-1"></div>

    <h3 class="text-xl text-[#3A4980] font-bold">${{ price }}</h3>

    <div class="border-t border-gray-300 my-6"></div>

    <div class="flex items-center space-x-10 w-full">
      <button
        class="px-20 py-3 text-white font-sm font-bold rounded-3xl shadow-md hover:bg-3A4980 bg-[#3A4980]"
        @click.stop="add"
      >
        <i class="fa fa-shopping-bag mr-2" aria-hidden="true"></i>
        Añadir al carrito
      </button>
    </div>
  </section>
</template>

<style scoped></style>
