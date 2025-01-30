<script setup lang="ts">
import { ref } from 'vue'
import NavBar from '@/components/NavBar.vue'
import Footer from '@/components/Footer.vue'
import Product from '@/components/ProductShop.vue'
import PaymentForm from '../components/PaymentForm.vue'
import Congratulation from '@/components/Congratulation.vue' // Componente de felicitación

import { useFruits } from '@/stores/useFruitsStore.ts'

const fruits = useFruits()

// lista global de frutas
const listFruits = fruits.data || []
console.log('HOLAAAAAAAAAAAAAAAAAAA', listFruits)

// Bandera reactiva para controlar el flujo entre las pantallas
const currentStep = ref<'cart' | 'payment' | 'congratulation'>('cart')

// Función para pasar al formulario de pago
const handleOrder = () => {
  currentStep.value = 'payment'
}

// Función para manejar el éxito del pago
const handlePaymentSuccess = () => {
  currentStep.value = 'congratulation'
}
</script>

<template>
  <NavBar />

  <main class="bg-gray-50 min-h-screen">
    <!-- Carrito -->
    <section v-if="currentStep === 'cart'" class="max-w-6xl mx-auto py-10 px-6">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Carrito</h1>

      <!-- Lista de Productos -->
      <div class="space-y-4">
        <Product
          v-for="fruit in listFruits"
          :key="fruit.id"
          :productID="fruit.id"
          :productName="fruit.name"
          :productImage="fruit.url_image"
          :price="fruit.price"
          :quantity="fruit.quantity"
        />
      </div>

      <!-- Detalles de Pago -->
      <div class="mt-6 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">DETALLES DEL PAGO</h2>
        <ul class="text-gray-700 space-y-2">
          <li class="flex justify-between">
            <span>Total del Pedido</span>
            <span class="font-bold">$774</span>
          </li>
          <li class="flex justify-between">
            <span>Empaque</span>
            <span class="text-green-500">Gratis</span>
          </li>
          <li class="flex justify-between">
            <span>Envío</span>
            <span class="font-bold">$50</span>
          </li>
        </ul>
        <div class="flex justify-between items-center border-t border-gray-200 mt-4 pt-4">
          <span class="text-xl font-bold">TOTAL</span>
          <span class="text-xl font-bold text-gray-800">$724.00</span>
        </div>
      </div>

      <!-- Botón Ordenar -->
      <button
        class="mt-6 w-full bg-yellow-400 text-white font-bold py-3 rounded-lg hover:bg-yellow-500 transition"
        @click="handleOrder"
      >
        Ordenar
      </button>
    </section>

    <!-- Formulario de Pago -->
    <section v-if="currentStep === 'payment'" class="max-w-6xl mx-auto py-10 px-6">
      <PaymentForm @paymentSuccess="handlePaymentSuccess" />
    </section>

    <!-- Pantalla de Felicitación -->
    <section v-if="currentStep === 'congratulation'" class="max-w-6xl mx-auto py-10 px-6">
      <Congratulation />
    </section>
  </main>

  <Footer />
</template>

<style scoped>
main {
  background-color: #f9fafb;
}
</style>
