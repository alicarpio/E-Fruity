import type { AxiosError, AxiosInstance, AxiosResponse, InternalAxiosRequestConfig } from 'axios' // Importa el tipo necesario para el interceptor
import axios from 'axios'

// Crear una instancia de Axios con configuración predeterminada
const apiClient: AxiosInstance = axios.create({
  baseURL: 'http://127.0.0.1:8000', // Cambia por la URL base de tu API
  headers: {
    'Content-Type': 'application/json', // Puedes ajustar los encabezados según tus necesidades
    Accept: 'application/json', // Asegura que la API responda en formato JSON
  },
  timeout: 10000, // Timeout en milisegundos
})

// Interceptor para agregar un token de autenticación (si es necesario)
apiClient.interceptors.request.use(
  (config: InternalAxiosRequestConfig) => {
    const token = localStorage.getItem('authToken') // O de donde obtengas tu token
    if (token) {
      config.headers['Authorization'] = `Bearer ${token}` // Agrega el token a las cabeceras
    }
    return config
  },
  (error: AxiosError) => {
    return Promise.reject(error)
  },
)

// Interceptor para gestionar errores de la respuesta
apiClient.interceptors.response.use(
  (response: AxiosResponse) => response, // Retorna la respuesta si está todo bien
  (error: AxiosError) => {
    // Maneja errores globalmente
    if (error.response) {
      // El servidor respondió con un código de error
      console.error('Error de respuesta: ', error.response)
    } else if (error.request) {
      // No se recibió respuesta del servidor
      console.error('Error de solicitud: ', error.request)
    } else {
      // Errores desconocidos
      console.error('Error general: ', error.message)
    }
    return Promise.reject(error) // Devuelve el error para que se pueda manejar en los componentes
  },
)

export default apiClient
