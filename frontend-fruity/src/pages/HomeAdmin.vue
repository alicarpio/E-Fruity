<script setup lang="ts">
import { useRouter } from 'vue-router'
import NavBar from '@/components/NavBar.vue'
import Footer from '@/components/Footer.vue'
import Product from '@/components/ProductCard.vue'
import { useFruits } from '@/stores/useFruitsStore.ts'

const router = useRouter()

const fruits = useFruits()
const listFruits = fruits.data || []

// Navegar a la página de ventas
const viewSales = () => {
  router.push('/sales') // Asegúrate de que esta ruta exista en tu router
}

// Navegar a la página de creación de productos
const createProduct = () => {
  router.push('/create-product') // Asegúrate de que esta ruta exista en tu router
}
</script>

<template>
  <NavBar />

  <!-- Hero Section -->
  <section class="relative">
    <img
      src="../assets/fruit.jpg"
      alt="frutas"
      class="w-full h-[40rem] object-cover transform brightness-90 rotate-180"
    />
    <h1
      class="absolute top-72 left-1/9 font-bold text-[3.3rem] transform -translate-x-1/2 text-[#173334] drop-shadow-lg"
    >
      Frutas
    </h1>
    <p
      class="absolute top-[26rem] left-[25.2rem] w-[40rem] transform -translate-x-1/2 -translate-y-1/2 text-lg drop-shadow-md"
    >
      Estos superalimentos están repletos de nutrientes vitales, como vitaminas y minerales, que
      pueden ayudarle a mantenerse sano. Además, son fáciles de disfrutar: ¡sólo tienes que añadir
      agua y dejar que se haga la magia!
    </p>
  </section>

  <!-- Barra de acciones -->
  <section class="py-6 px-6 flex justify-between items-center">
    <h1 class="text-4xl font-bold text-gray-800 mt-5">Stock</h1>
    <div class="flex space-x-4">
      <!-- Botón Visualizar Ventas -->
      <button
        @click="viewSales"
        class="bg-green-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-600 transition"
      >
        Visualizar ventas
      </button>
      <!-- Botón Crear -->
      <button
        @click="createProduct"
        class="bg-yellow-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-500 transition"
      >
        Crear
      </button>
    </div>
  </section>

  <!-- Productos -->
  <section class="py-10 px-6">
    <div class="gap-x-5 justify-center flex md:gap-x-5 lg:gap-x-10 gap-y-9 flex-wrap">
      <!-- Renderizamos varios productos -->
      <Product
        v-for="fruit in listFruits"
        :key="fruit.id"
        :productID="fruit.id"
        :productName="fruit.name"
        :productImage="fruit.url_image"
        :category="fruit.category"
        :price="fruit.price"
      />
    </div>
  </section>

  <Footer />
</template>

<style scoped></style>
