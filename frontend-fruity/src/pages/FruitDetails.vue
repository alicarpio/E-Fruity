<script setup lang="ts">
import ProductDetails from '@/components/ProductDetails.vue'
import ProductImage from '@/components/ProductImage.vue'
import fruitImage from '@/assets/cherry.png'
import NavBar from '@/components/NavBar.vue'
import Footer from '@/components/Footer.vue'
</script>

<template>
  <NavBar />
  <section>
    <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-8 mt-16">
      <ProductImage product-name="Name" :productImage="fruitImage" />
      <ProductDetails />
    </div>
  </section>
  <section class="mx-30">
    <h2 class="text-[#3A4980] font-bold mt-20 text-sm">Descripción</h2>
    <div class="border-t border-gray-300 mb-5 mt-1"></div>
    <h3 class="font-bold text-base mb-3">Descripción del producto</h3>
    <p class="text-sm mb-32">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique ac justo eu
      efficitur. Integer imperdiet bibendum felis, eget consequat est accumsan a. Nam pellentesque
      massa ac mi facilisis, nec hendrerit justo faucibus. Cras rhoncus quam erat, id bibendum orci
      accumsan eu. Aenean est nibh, consequat nec est vel, ultricies pulvinar eros. Ut leo quam,
      aliquet nec neque quis, ullamcorper finibus leo. Etiam eget hendrerit urna. Ut eros arcu,
      faucibus sit amet nisi sit amet, mattis pulvinar diam. Suspendisse potenti. Nunc nec maximus
      velit, sit amet semper mi.
    </p>
  </section>
  <Footer />
</template>
