import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './components/admin/Dashboard.vue';
import Settings from './components/admin/Settings.vue';
import Technology from './components/admin/Technology.vue';
import Profile from './components/admin/Profile.vue';
import Project from './components/admin/Project.vue';
import Experiense from './components/admin/Experiense.vue';
import Education from './components/admin/Education.vue';

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
  {
    path: '/admin/projects',
    name: 'Project',
    component: Project,
  },
  {
    path: '/admin/experiense',
    name: 'Experiense',
    component: Experiense,
  },
  {
    path: '/admin/education',
    name: 'Education',
    component: Education,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
