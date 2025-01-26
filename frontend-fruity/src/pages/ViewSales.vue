<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import Footer from '@/components/Footer.vue';

// Valores quemados para las órdenes
const orders = [
  {
    order_id: 1,
    user_id: 101,
    order_date: '2025-01-20',
    order_status: 'Entregado',
    order_total: 250.50,
  },
  {
    order_id: 2,
    user_id: 102,
    order_date: '2025-01-22',
    order_status: 'En camino',
    order_total: 175.00,
  },
  {
    order_id: 3,
    user_id: 103,
    order_date: '2025-01-23',
    order_status: 'Pendiente',
    order_total: 300.75,
  },
  {
    order_id: 4,
    user_id: 104,
    order_date: '2025-01-24',
    order_status: 'Cancelado',
    order_total: 90.00,
  },
];
</script>

<template>
  <NavBar />

  <!-- Contenido Principal -->
  <main class="bg-gray-50 min-h-screen py-10 px-6">
    <section class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
      <!-- Título -->
      <h1 class="text-3xl font-bold text-gray-800 mb-8">Órdenes</h1>

      <!-- Tabla de Órdenes -->
      <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
          <tr>
            <th class="border border-gray-300 px-4 py-2 text-left">ID Orden</th>
            <th class="border border-gray-300 px-4 py-2 text-left">ID Usuario</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Fecha</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Estado</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="order in orders"
            :key="order.order_id"
            class="hover:bg-gray-50"
          >
            <td class="border border-gray-300 px-4 py-2">{{ order.order_id }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ order.user_id }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ order.order_date }}</td>
            <td class="border border-gray-300 px-4 py-2">
              <span
                :class="{
                  'text-green-500 font-semibold': order.order_status === 'Entregado',
                  'text-blue-500 font-semibold': order.order_status === 'En camino',
                  'text-yellow-500 font-semibold': order.order_status === 'Pendiente',
                  'text-red-500 font-semibold': order.order_status === 'Cancelado',
                }"
              >
                {{ order.order_status }}
              </span>
            </td>
            <td class="border border-gray-300 px-4 py-2 text-right">
              ${{ order.order_total.toFixed(2) }}
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <Footer />
</template>

<style scoped>
/* Ajuste para las tablas */
table th,
table td {
  text-align: left;
}
</style>
