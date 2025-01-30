import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../pages/HomePage.vue'),
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../pages/HomeAdmin.vue'),
    },
    {
      path: '/shopping-cart',
      name: 'shopping-cart',
      component: () => import('../pages/ShoppingCart.vue'),
    },
    {
      path: '/create-product',
      name: 'create-product',
      component: () => import('../pages/CreateProduct.vue'),
    },
    {
      path: '/sales',
      name: 'sales',
      component: () => import('../pages/ViewSales.vue'),
    },
    {
      path: '/fruits/:id',
      name: 'fruit-details',
      component: () => import('../pages/FruitDetails.vue'),
    },
    {
      path: '/admin/fruits/edit/:id',
      name: 'fruit-edit',
      component: () => import('../pages/EditProduct.vue'),
    },
  ],
})

export default router
