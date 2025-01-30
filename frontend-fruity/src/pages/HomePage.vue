<script setup lang="ts">
import NavBar from '@/components/NavBar.vue'
import Footer from '@/components/Footer.vue'
import { useFruits } from '@/stores/useFruitsStore.ts'
import Product from '@/components/ProductCard.vue'

import { useRouter } from 'vue-router'

const router = useRouter()

const goToProductPage = (id: number, event: MouseEvent) => {
  const target = event.target as HTMLElement
  if (target.tagName.toLowerCase() !== 'button') {
    router.push(`/fruits/${id}`)
  }
}

const fruits = useFruits()

const listFruits = fruits.data || []
console.log('ADIOSSSSS', listFruits)
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
      class="absolute top-[26rem] left-[24.9rem] w-[40rem] transform -translate-x-1/2 -translate-y-1/2 text-lg drop-shadow-md"
    >
      Estos superalimentos están repletos de nutrientes vitales, como vitaminas y minerales, que
      pueden ayudarle a mantenerse sano. Además, son fáciles de disfrutar: ¡sólo tienes que añadir
      agua y dejar que se haga la magia!
    </p>
  </section>

  <section class="py-10 px-6">
    <h2 class="text-3xl font-bold text-center mb-8">Nuestros Productos</h2>
    <div class="flex flex-wrap space-x-10 space-y-10 justify-center">
      <Product
        v-for="fruit in listFruits"
        :key="fruit.id"
        :productID="fruit.id"
        :productName="fruit.name"
        :productImage="fruit.url_image"
        :price="fruit.price"
        @click="goToProductPage(fruit.id, $event)"
      />
    </div>
  </section>

  <Footer />
</template>

<style scoped></style>
