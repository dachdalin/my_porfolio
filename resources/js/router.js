import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './components/admin/Dashboard.vue';
import Settings from './components/admin/Settings.vue';
import Technology from './components/admin/Technology.vue';
import Profile from './components/admin/Profile.vue';

const routes = [
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
  },
  {
    path: '/admin/settings',
    name: 'settings',
    component: Settings,
  },
  {
    path: '/admin/technologies',
    name: 'Technology',
    component: Technology,
  },
  {
    path: '/admin/profile',
    name: 'Profile',
    component: Profile,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
