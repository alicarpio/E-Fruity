import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../pages/HomeAdmin.vue'), // Página principal
    },
    {
      path: '/shopping-cart',
      name: 'shopping-cart',
      component: () => import('../pages/ShoppingCart.vue'), // Página del carrito
    },
    {
      path: '/create-product',
      name: 'create-product',
      component: () => import('../pages/CreateProduct.vue'), // Página del carrito
    },
  ],
});

export default router;

