<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import Footer from '@/components/Footer.vue';
import PorductShop from '@/components/PorductShop.vue';
</script>

<template>
  <!-- NavBar -->
  <NavBar />

  <!-- Contenido Principal -->
  <main class="bg-gray-50 min-h-screen">
    <section class="max-w-6xl mx-auto py-10 px-6">
      <!-- Título -->
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Carrito</h1>

      <!-- Lista de Productos -->
      <div class="space-y-4">
        <PorductShop />
        <PorductShop />
      </div>

      <!-- Añadir Cupón -->
      <div class="mt-6 flex items-center justify-between border-b border-gray-200 pb-4">
        <button class="flex items-center space-x-2 text-yellow-500 font-medium">
          <span>➕</span>
          <span>Add Coupon</span>
        </button>
        <button class="text-gray-500 text-lg">➤</button>
      </div>

      <!-- Detalles de Pago -->
      <div class="mt-6 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">PAYMENT DETAILS</h2>
        <ul class="text-gray-700 space-y-2">
          <li class="flex justify-between">
            <span>Bag Total</span>
            <span class="font-bold">$774</span>
          </li>
          <li class="flex justify-between">
            <span>Packaging</span>
            <span class="text-green-500">Free</span>
          </li>
          <li class="flex justify-between">
            <span>Shipping Charges</span>
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
      >
        Order
      </button>
    </section>
  </main>

  <!-- Footer -->
  <Footer />
</template>

<style scoped>
main {
  background-color: #f9fafb;
}
</style>
