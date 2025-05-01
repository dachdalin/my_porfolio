import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './components/admin/Dashboard.vue';
import Settings from './components/admin/Settings.vue';

const routes = [
  {
    path: '/admin',
    name: 'dashboard',
    component: Dashboard,
  },
  {
    path: '/admin/settings',
    name: 'settings',
    component: Settings,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
