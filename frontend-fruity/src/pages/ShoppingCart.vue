<script setup lang="ts">
import { ref } from 'vue';
import NavBar from '@/components/NavBar.vue';
import Footer from '@/components/Footer.vue';
import PorductShop from '@/components/PorductShop.vue';
import Congratulation from '@/components/Congratulation.vue'; // Importamos el componente Congratulation

// Bandera reactiva para alternar entre el carrito y la pantalla de confirmación
const showCongratulation = ref(false);

// Función para mostrar el componente Congratulation
const handleOrder = () => {
  showCongratulation.value = true;
};
</script>

<template>
  <!-- NavBar -->
  <NavBar />

  <!-- Contenido Principal -->
  <main class="bg-gray-50 min-h-screen">
    <section v-if="!showCongratulation" class="max-w-6xl mx-auto py-10 px-6">
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

    <!-- Pantalla de Felicitaciones -->
    <section v-else>
      <Congratulation />
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

