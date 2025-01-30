<script lang="ts">
import { defineComponent } from 'vue';
import { useRouter } from 'vue-router';
import {resetCart } from '@/stores/useFruitsStore.ts'

export default defineComponent({
  name: 'CongratulationComponent',
  setup() {
    const router = useRouter();

    // Redirige al usuario a la tienda (ruta raíz o personalizada)
    const goToShop = () => {
      resetCart();
      router.push('/');
    };

    return {
      goToShop,
    };
  },
});
</script>


<template>
  <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-6">
    <!-- Imagen -->
    <img
      src="/src/assets/congrats.png"
      alt="Felicitaciones"
      class="w-40 h-40 mb-6"
    />

    <!-- Mensaje -->
    <h1 class="text-2xl font-bold text-gray-800 mb-4">¡Felicitaciones!</h1>
    <p class="text-gray-600 text-center mb-6">
      Tu pedido ha sido realizado y será entregado pronto. ¡Gracias por comprar con nosotros!
    </p>

    <!-- Botón para seguir comprando -->
    <button
      @click="goToShop"
      class="bg-yellow-400 text-white font-semibold py-3 px-6 rounded-lg hover:bg-yellow-500 transition"
    >
      Seguir comprando
    </button>
  </div>
</template>



<style scoped>
/* Agrega estilos personalizados si es necesario */
</style>
