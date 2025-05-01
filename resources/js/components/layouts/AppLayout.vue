<template>
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        <nav class="bg-gray-800 text-white p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <!-- Logo/Brand -->
                <div class="text-white text-2xl font-bold">
                    Admin Panel
                </div>

                <!-- Center Menu - Help -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Main Navigation Links -->
                    <router-link to="/dashboard" class="text-white hover:text-gray-300">Dashboard</router-link>
                    <router-link to="/admin/technologies"
                        class="text-white hover:text-gray-300">Technology</router-link>
                    <router-link to="/admin/settings" class="text-white hover:text-gray-300">Settings</router-link>
                    <!-- <router-view>

            </router-view> -->
                </div>

                <!-- Right Menu - Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- User Dropdown -->
                    <div class="relative help-menu">
                        <button @click="toggleHelpMenu"
                            class="text-white hover:text-gray-300 px-4 py-2 flex items-center gap-1 focus:outline-none">
                            {{ authname }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Help Dropdown -->
                        <div v-if="isHelpMenuOpen"
                            class="absolute z-10 mt-2 w-48 origin-top rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <!-- <a href="" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a> -->
                                <router-link to="/admin/profile"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700">Profile</router-link>
                                <a href="#" @click.prevent="logout"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700">Logout</a>

                            </div>
                        </div>
                    </div>

                    <!-- Theme Toggle -->
                    <button @click="toggleDarkMode" class="text-white hover:text-gray-300 p-2 rounded-full">
                        <svg v-if="isDarkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>

                <!-- Hamburger Menu for Mobile -->
                <div class="md:hidden">
                    <button @click="toggleMenu" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-if="isMenuOpen" class="md:hidden bg-blue-700 p-4 mt-2">
                <router-link to="/admin" class="block text-white py-2">Dashboard</router-link>
                <router-link to="/admin/settings" class="block text-white py-2">Settings</router-link>
                <a href="#" class="block text-white py-2">Help</a>
                <div class="flex items-center justify-between pt-2 mt-2 border-t border-blue-500">
                    <a href="#" class="text-white">Logout</a>
                    <button @click="toggleDarkMode" class="text-white p-2">
                        <span v-if="isDarkMode">Light Mode</span>
                        <span v-else>Dark Mode</span>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Main Content (Children Pages) -->
        <main class="flex-grow">
            <slot></slot>
        </main>

        <footer class="d-flex flex-column bg-gray-800 text-white p-4 mt-4" color="teal" rounded="lg">
            <div class="flex w-100 align-center justify-between px-4 py-2">
                <strong>&copy; 2025 Admin Panel. All Rights Reserved.</strong>

                <div class="d-flex ga-2 ms-auto">
                    <a href="#" class="text-white hover:text-gray-300 mx-2">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300 mx-2">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-300 mx-2">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import router from '../../router';

export default {
    name: 'AppLayout',
    data() {
        return {
            isMenuOpen: false,
            isUserMenuOpen: false,
            isHelpMenuOpen: false,
            isDarkMode: false,
            authname: 'Admin',
            icons: [
                'fab fa-facebook',
                'fab fa-github',
                'fab fa-linkedin',
            ],
        };
    },
    methods: {
        toggleMenu() {
            this.isMenuOpen = !this.isMenuOpen;
            this.isUserMenuOpen = false;
            this.isHelpMenuOpen = false;
        },
        toggleUserMenu() {
            this.isUserMenuOpen = !this.isUserMenuOpen;
            this.isHelpMenuOpen = false;
        },
        toggleHelpMenu() {
            this.isHelpMenuOpen = !this.isHelpMenuOpen;
            this.isUserMenuOpen = false;
        },
        toggleDarkMode() {
            // Toggle the dark mode state
            this.isDarkMode = !this.isDarkMode;

            // Apply the theme to the document
            if (this.isDarkMode) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        },
        async logout() {
            try {
                await axios.post('/logout');
                localStorage.removeItem('auth_token');
                window.location.reload();
                this.$router.push('/login');
            } catch (error) {
                console.error('Logout error:', error);
                alert('An error occurred while logging out.');
            }
        },
    },
    mounted() {
        // Close dropdowns when clicking outside
        document.addEventListener('click', (event) => {
            const userMenu = this.$el.querySelector('.user-menu');
            const helpMenu = this.$el.querySelector('.help-menu');

            if (this.isUserMenuOpen && event.target !== userMenu && !userMenu?.contains(event.target)) {
                this.isUserMenuOpen = false;
            }

            if (this.isHelpMenuOpen && event.target !== helpMenu && !helpMenu?.contains(event.target)) {
                this.isHelpMenuOpen = false;
            }
        });

        const savedTheme = localStorage.getItem('theme') ||
            (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

        // Apply the saved theme and update component state
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            this.isDarkMode = true;
        } else {
            document.documentElement.classList.remove('dark');
            this.isDarkMode = false;
        }
    }
};
</script>
