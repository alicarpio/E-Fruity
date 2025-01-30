import type { QueryFunctionContext } from '@tanstack/vue-query'
import { useMutation, useQuery, useQueryClient } from '@tanstack/vue-query'
import apiClient from '@/api/axios'
import dayjs from 'dayjs'

export interface Order {
  id: number
  order_date: string
  order_status: string
  order_total: number
}

export interface OrderDetail{
  id: number
  name: string
  quantity: number
  unit_price: number
  subtotal: number
  order_id: number
}

// funcion para obtener todas las ordenes
export async function getOrders({}: QueryFunctionContext): Promise<Order[]> {
  try {
    const response = await apiClient.get('api/v1/orders')
    console.log('Response:', response.data.data)
    return response.data.data
  } catch (error: any) {
    console.error('Error al obtener ordenes:', error.message)
    return []
  }
}

// funcion para obtener una orden por id
async function getOrderById(id: number): Promise<Order | null> {
  try {
    const response = await apiClient.get(`/api/v1/orders/${id}`)
    console.log('Response:', response.data.data)
    return await response.data.data
  } catch {
    return null
  }
}

// funcion para crear una ordencon la fecha de hoy con la fecha de hoy
async function createOrder(newOrder: Order): Promise<Order | null> {
  const response = await apiClient.post(
    `/api/v1/orders`,
    {
      order_date: dayjs().format('YYYY-MM-DD'),
      order_status: newOrder.order_status,
      order_total: newOrder.order_total,
    },
    {
      headers: { 'Content-Type': 'application/json' },
    },
  )
  console.log('Response:', response.data.data)
  return response.data
}

