<script setup lang="ts">
import { ref, watchEffect } from 'vue'
import NavBar from '@/components/NavBar.vue'
import Footer from '@/components/Footer.vue'
import { useFruit } from '@/stores/useFruitsStore.ts'
import { useRoute } from 'vue-router'

const route = useRoute()

const id = parseInt(route.params.id as string)
const fruit = useFruit(id)

// Datos del formulario
const productName = ref('')
const productDescription = ref('')
const productCategory = ref('')
const productPrice = ref(0)
const productStock = ref(0)
const productImage = ref<File | null>(null)

// Manejar la subida de imágenes
const handleImageUpload = (event: Event) => {
  const target = event.target as HTMLInputElement
  if (target.files && target.files[0]) {
    productImage.value = target.files[0]
  }
}

watchEffect(() => {
  if (fruit.data.value) {
    productName.value = fruit.data.value.name || ''
    productDescription.value = fruit.data.value.description || ''
    productCategory.value = fruit.data.value.category || ''
    productPrice.value = fruit.data.value.price || 0
    productStock.value = fruit.data.value.stock || 0
  }
})

// Función para enviar los datos del formulario
const handleSubmit = async () => {
  const fruitData = {
    name: productName.value,
    url_image: fruit.data.value.url_image,
    description: productDescription.value,
    price: productPrice.value,
    stock: productStock.value,
    quantity: 0,
    category: productCategory.value,
  }
  console.log('fruitData', fruitData)
  console.log(fruitData)
  try {
    await fruit.update(fruitData) // Llamamos a la mutación para crear la fruta
    alert('Fruta actualizada exitosamente 🎉')
  } catch (err) {
    console.error('Error al actualizar la fruta:', err)
    alert('Hubo un error al actualizar la fruta.')
  }
}
</script>

<template>
  <NavBar />

  <!-- Contenido Principal -->
  <main class="bg-gray-50 min-h-screen py-10 px-6">
    <section class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
      <!-- Título -->
      <h1 class="text-3xl font-bold text-gray-800 mb-8">Editar fruta {{ productName }}</h1>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Subir Imagen -->
        <div
          class="flex flex-col items-center justify-center border border-gray-300 rounded-lg p-6 bg-gray-50"
        >
          <label
            for="product-image"
            class="flex flex-col items-center justify-center cursor-pointer"
          >
            <img
              :src="fruit.data.value.url_image"
              alt="Sube la imagen del producto"
              class="w-48 h-48 object-cover mb-4"
            />
            <span class="text-gray-500 text-center">Sube la imagen del producto</span>
          </label>
          <input
            id="product-image"
            type="file"
            accept="image/*"
            class="hidden"
            @change="handleImageUpload"
          />
        </div>

        <!-- Formulario -->
        <form class="space-y-4">
          <!-- Nombre -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input
              id="name"
              type="text"
              v-model="productName"
              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-yellow-400 focus:border-yellow-400"
              placeholder="Nombre del producto"
            />
          </div>

          <!-- Descripción -->
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700"
              >Descripción</label
            >
            <textarea
              id="description"
              v-model="productDescription"
              rows="3"
              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-yellow-400 focus:border-yellow-400"
              placeholder="Descripción del producto"
            ></textarea>
          </div>

          <!-- Categoría -->
          <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select
              id="category"
              v-model="productCategory"
              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-yellow-400 focus:border-yellow-400"
            >
              <option disabled value="">Seleccione la categoría</option>
              <option>Ácida</option>
              <option>Dulce</option>
              <option>Tropical</option>
            </select>
          </div>

          <!-- Precio -->
          <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Precio por Kg</label>
            <input
              id="price"
              type="number"
              v-model="productPrice"
              step="0.01"
              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-yellow-400 focus:border-yellow-400"
              placeholder="$0.00"
            />
          </div>

          <!-- Stock -->
          <div>
            <label for="stock" class="block text-sm font-medium text-gray-700"
              >Cantidad en stock</label
            >
            <input
              id="stock"
              type="number"
              v-model="productStock"
              class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm p-2 focus:ring-yellow-400 f focus:border-yellow-400"
              placeholder="0"
            />
          </div>
        </form>
      </div>

      <!-- Botón Crear -->
      <button
        @click.prevent="handleSubmit"
        class="mt-6 w-full bg-yellow-400 text-white font-bold py-3 rounded-lg hover:bg-yellow-500 transition"
      >
        Editar
      </button>
    </section>
  </main>

  <Footer />
</template>

<style scoped></style>
