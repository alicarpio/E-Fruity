<script setup lang="ts">
import { computed, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { addToCart, useFruit } from '@/stores/useFruitsStore.ts'
import SweetAlert from 'sweetalert2'

const route = useRoute()
const router = useRouter() // Obtén el router
const isAdminPage = computed(() => route.path === '/admin')

const buttonText = computed(() => (isAdminPage.value ? 'Editar' : 'Agregar al carrito'))


const props = defineProps({
  productID: {
    type: Number,
    required: true,
  },

  productName: {
    type: String,
    required: true,
  },
  productImage: {
    type: String,
    required: true,
  },
  price: {
    type: Number,
    required: true,
  },
  category: {
    type: String,
    required: false,
  },
})

console.log('id', props.productID)
const { remove } = useFruit(props.productID)
const deleteProduct = async (id: number) => {
  const result = await SweetAlert.fire({
    title: '¿Estás seguro?',
    text: 'Esta acción no se puede deshacer',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar',
  })

  if (result.isConfirmed && id) {
    try {
      await remove()
      SweetAlert.fire('Eliminado', 'El producto ha sido eliminado.', 'success')
    } catch (error) {
      console.error('Error al eliminar el producto:', error)
      SweetAlert.fire('Error', 'No se pudo eliminar el producto.', 'error')
    }
  }
}
const handleButtonClick = () => {
  if (isAdminPage.value) {
    console.log(`Editando producto:`)
    router.push(`admin/fruits/edit/${props.productID}`) // Ejemplo: redirige a una página de edición de producto
  } else {
    add()
  }
}

const add = () => {
  addToCart(props.productID) // Agrega el producto al carrito
  SweetAlert.fire({
    icon: 'success',
    title: 'Producto agregado al carrito',
    showConfirmButton: false,
    timer: 1500,
  })
}
</script>

<template>
  <div
    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-4 cursor-pointer"
    @click="$emit('click', $event)"
  >

    <div class="flex justify-end mb-5 p-2">
      <i
        v-if="isAdminPage"
        class="fa-solid fa-trash text-red-500 cursor-pointer"
        @click="deleteProduct(props.productID)"
      ></i>
    </div>
    <!-- Imagen del Producto -->
    <img
      :src="props.productImage"
      :alt="props.productName"
      class="w-90 h-48 object-contain rounded-lg"
    />

    <!-- Información del Producto -->
    <div class="mt-4 text-center">
      <h2 class="text-xl font-bold">{{ productName }}</h2>

      <!-- Estrellas de Calificación -->
      <div class="flex items-center justify-center mt-1" v-if="!isAdminPage">
        <div class="flex text-yellow-400">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <span class="text-sm text-gray-500 ml-2">(1)</span>
      </div>

      <div class="" v-if="isAdminPage">{{ props.category }}</div>

      <!-- Precio -->
      <div class="flex items-center justify-center mt-3">
        <span class="text-2xl font-bold text-gray-800">$ {{ props.price }} </span>
      </div>

      <button
        class="mt-6 w-full bg-yellow-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-500 cursor-pointer"
        @click.stop="handleButtonClick"
      >
        {{ buttonText }}
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Sobrescribir el estilo para los botones de número */
input[type='number']::-webkit-inner-spin-button,
input[type='number']::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
