import type { QueryFunctionContext } from '@tanstack/vue-query'
import { useMutation, useQuery, useQueryClient } from '@tanstack/vue-query'
import apiClient from '@/api/axios'

export interface Fruit {
  description: string
  id: number
  name: string
  price: number
  stock: number
  url_image: string
  quantity: number
  category: string
}

export interface NewFruit {
  name: string
  description: string
  price: number
  stock: number
  url_image: string | null
  quantity: number
  category: string
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

async function getFruitById(id: number): Promise<Fruit | null> {
  try {
    const response = await apiClient.get(`/api/v1/fruits/${id}`)
    console.log('Response:', response.data.data) // Puedes revisar la respuesta aquí
    return await response.data.data
  } catch {
    return null
  }
}

async function createFruit(newFruit: NewFruit): Promise<Fruit | null> {
  const response = await apiClient.post(
    `/api/v1/fruits`,
    {
      name: newFruit.name,
      url_image: newFruit.url_image,
      description: newFruit.description,
      price: newFruit.price,
      stock: newFruit.stock,
      quantity: newFruit.quantity,
      category: newFruit.category,
    },
    {
      headers: { 'Content-Type': 'application/json' },
    },
  )
  console.log('Response:', response.data.data)
  return response.data
}

async function deleteFruit(id: number): Promise<void> {
  await apiClient.delete(`/api/v1/fruits/${id}`)
}

export const useFruit = (fruitId: number) => {
  const queryClient = useQueryClient()

  const { data, isFetching } = useQuery({
    queryKey: ['animals', fruitId],
    queryFn: async () => await getFruitById(fruitId),
    initialData: null,
  })

  const { mutateAsync: remove } = useMutation({
    mutationKey: ['fruits', fruitId],
    mutationFn: async () => await deleteFruit(fruitId),
    onSuccess: async () => {
      await queryClient.invalidateQueries({
        queryKey: ['fruits'],
      })
    },
  })

  const { mutateAsync: update } = useMutation({
    mutationKey: ['fruits', fruitId],
    mutationFn: async function (payload: NewFruit) {
      await apiClient.put(`/api/v1/fruits/${fruitId}`, payload)
    },
    onSuccess: async () => {
      await queryClient.invalidateQueries({
        queryKey: ['fruits'],
      })
    },
  })

  return {
    data,
    loading: isFetching,
    remove,
    update,
  }
}

export const useFruits = () => {
  const queryClient = useQueryClient()

  // Usa vue-query para realizar la consulta
  const { isLoading, isError, data, error } = useQuery<Fruit[]>({
    queryKey: ['fruits'], // Clave única para la consulta
    queryFn: getFruits, // Función que realiza la consulta
    initialData: [], // Datos iniciales, en este caso un array vacío
  })

  const { mutateAsync: create } = useMutation({
    mutationKey: ['animals'],
    mutationFn: createFruit,
    onSuccess: async () => {
      await queryClient.invalidateQueries({
        queryKey: ['animals'],
      })
    },
  })

  return {
    isLoading,
    isError,
    data,
    error,
    create,
  }
}

export const addToCart = async (fruitId: number) => {
  try {
    const response = await apiClient.put(`/api/v1/fruits/${fruitId}/add`)
    console.log('Response:', response.data.data) // Puedes revisar la respuesta aquí
    return true
  } catch {
    return false
  }
}

export const removeFromCart = async (fruitId: number) => {
  try {
    const response = await apiClient.put(`/api/v1/fruits/${fruitId}/decrease`)
    console.log('Response:', response.data.data) // Puedes revisar la respuesta aquí
    return true
  } catch {
    return false
  }
}

export const resetCart = async () => {
  try {
    const response = await apiClient.get(`/api/v1/resetCart`)
    console.log('Response:', response.data.data) // Puedes revisar la respuesta aquí
    return true
  } catch {
    return false
  }
}
