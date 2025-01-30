<script setup lang="ts">
import ProductDetails from '@/components/ProductDetails.vue'
import ProductImage from '@/components/ProductImage.vue'
import NavBar from '@/components/NavBar.vue'
import Footer from '@/components/Footer.vue'
import { useRoute } from 'vue-router'
import { useFruit } from '@/stores/useFruitsStore.ts'

const route = useRoute()

const id = parseInt(route.params.id as string)
const fruit = useFruit(id)

console.log('fruit by id ')
console.log(fruit)
</script>

<template>
  <NavBar />
  <section>
    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-8 mt-16">
      <ProductImage
        :product-name="fruit.data.value.name"
        :productImage="fruit.data.value?.url_image"
      />
      <ProductDetails :product-name="fruit.data.value.name" :price="fruit.data.value.price" />
    </div>
  </section>
  <section class="mx-30">
    <h2 class="text-[#3A4980] font-bold mt-20 text-sm">Descripción</h2>
    <div class="border-t border-gray-300 mb-5 mt-1"></div>
    <h3 class="font-bold text-base mb-3">Descripción del producto</h3>
    <p class="text-sm mb-32">{{ fruit.data.value.description }}</p>
  </section>
  <Footer />
</template>
