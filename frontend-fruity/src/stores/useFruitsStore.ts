import type { QueryFunctionContext } from '@tanstack/vue-query'
import { useQuery } from '@tanstack/vue-query'
import apiClient from '@/api/axios'

export interface Fruit {
  description: string
  id: number
  name: string
  price: number
  stock: number
  url_image: string
}

export async function getFruits({}: QueryFunctionContext): Promise<Fruit[]> {
  try {
    const response = await apiClient.get('api/v1/fruits') // Llamada a la API para obtener las frutas
    console.log('Response:', response.data.data) // Puedes revisar la respuesta aquí
    return response.data.data // Asignar los datos de frutas
  } catch (error: any) {
    console.error('Error al obtener frutas:', error.message) // Manejo de errores
    return [] // Retorna un array vacío en caso de error
  }
}

export const useFruits = () => {
  // Usa vue-query para realizar la consulta
  const { isLoading, isError, data, error } = useQuery<Fruit[]>({
    queryKey: ['fruits'], // Clave única para la consulta
    queryFn: getFruits, // Función que realiza la consulta
    initialData: [], // Datos iniciales, en este caso un array vacío
  })

  return {
    isLoading, // Estado de carga
    isError, // Estado de error
    data, // Datos obtenidos (frutas)
    error, // Error si ocurre uno
  }
}
