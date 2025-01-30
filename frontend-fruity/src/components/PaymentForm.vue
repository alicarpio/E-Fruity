<script setup lang="ts">
import { ref, defineEmits } from 'vue'
import sweetAlert from 'sweetalert2'

// Emitimos un evento cuando el pago sea exitoso
const emit = defineEmits(['paymentSuccess'])

// Variables reactivas para capturar los datos del formulario
const cardNumber = ref('')
const cardHolder = ref('')
const expiryDate = ref('')
const cvv = ref('')

// Función para manejar el envío del formulario
const handlePayment = () => {
  // Validación básica
  if (!cardNumber.value || !cardHolder.value || !expiryDate.value || !cvv.value) {
    sweetAlert.fire('Error', 'Por favor, completa todos los campos.', 'error')
    return
  }

  if (!/^\d{16}$/.test(cardNumber.value)) {
    sweetAlert.fire('Error', 'El número de tarjeta debe tener 16 dígitos.', 'error')
    return
  }

  if (!/^\d{3,4}$/.test(cvv.value)) {
    sweetAlert.fire('Error', 'El CVV debe tener 3 o 4 dígitos.', 'error')
    return
  }

  emit('paymentSuccess') // Emitimos el evento de éxito
}
</script>

<template>
  <!-- Contenedor del Formulario -->
  <section class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
    <!-- Título -->
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Formulario de Pago</h1>

    <!-- Formulario -->
    <form @submit.prevent="handlePayment" class="space-y-6">
      <!-- Número de Tarjeta -->
      <div>
        <label for="card-number" class="block text-sm font-medium text-gray-700"
          >Número de Tarjeta</label
        >
        <input
          id="card-number"
          type="text"
          v-model="cardNumber"
          maxlength="16"
          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400"
          placeholder="1234 5678 9123 4567"
        />
      </div>

      <!-- Nombre del Titular -->
      <div>
        <label for="card-holder" class="block text-sm font-medium text-gray-700"
          >Nombre del Titular</label
        >
        <input
          id="card-holder"
          type="text"
          v-model="cardHolder"
          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400"
          placeholder="Nombre Completo"
        />
      </div>

      <!-- Fecha de Expiración y CVV -->
      <div class="flex space-x-4">
        <!-- Fecha de Expiración -->
        <div class="flex-1">
          <label for="expiry-date" class="block text-sm font-medium text-gray-700"
            >Fecha de Expiración</label
          >
          <input
            id="expiry-date"
            type="text"
            v-model="expiryDate"
            maxlength="5"
            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400"
            placeholder="MM/AA"
          />
        </div>
        <!-- CVV -->
        <div class="flex-1">
          <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
          <input
            id="cvv"
            type="text"
            v-model="cvv"
            maxlength="4"
            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400"
            placeholder="123"
          />
        </div>
      </div>

      <!-- Botón Pagar -->
      <button
        type="submit"
        class="w-full bg-yellow-400 text-white font-bold py-3 rounded-lg hover:bg-yellow-500 transition"
      >
        Pagar
      </button>
    </form>
  </section>
</template>

<style scoped></style>
