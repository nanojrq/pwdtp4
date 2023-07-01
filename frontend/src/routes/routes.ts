import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue';
import SociosListar from '../components/Socios/Listar.vue';
import SociosCrear from '../components/Socios/Crear.vue';
import SocioActualizar from '../components/Socios/Actualizar.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../components/About.vue')
    },
    {
      path: '/socios',
      name: 'Socios',
      component: SociosListar
    },
    {
      path: '/socios/crear',
      name: 'sociosCrear',
      component: SociosCrear
    },
    { path: '/socios/actualizar/:id', 
    name: 'ActualizarSocio', 
    component: SocioActualizar }
  ]
})

export default router