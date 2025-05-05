<template>
    <AppLayout>
        <Toast v-if="showToastVisible" :type="toastType" :message="toastMessage" @close="showToastVisible = false"  />
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200">Profile</h1>
                <p class="mt-4 text-gray-600 dark:text-gray-200">Update your profile information below.</p>

                <form class="mt-8 space-y-6" @submit.prevent="updateProfile" method="POST">
                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                        <input type="text" v-model="form.name" placeholder="Enter your name"
                            class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                        <input type="email" v-model="form.email" id="email" placeholder="Enter your email"
                            class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                        <input type="password" v-model="form.password" id="password" placeholder="Enter your password"
                            class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="confirm_password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                        <input type="password" id="confirm_password" placeholder="Confirm your password"
                            class="mt-2 block w-full px-4 py-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from '../Layouts/AppLayout.vue';
import api from '../../services/api';
import Toast from '../Toast.vue';
export default {
    name: 'Profile',
    components: {
        AppLayout,
        Toast,
    },
    data() {
        return {
            form:{
                id:null,
                name: '',
                email: '',
                password: '',
                confirm_password: '',
            },
            user_id: window.USER_ID,
            showToastVisible: false,
            toastMessage: '',
            toastType: '',
        };
    },
    created() {
        this.fetchProfile();
    },
    methods: {
        updateProfile() {
            try {
                api.updateUser(this.form);
                this.showToast('Profile updated successfully', 'success');
            } catch (error) {
                this.showToast('An unexpected error occurred', 'error');
            }
        },
        async fetchProfile() {
            try {
                const response = await api.getUser(this.user_id);
                const user = response.data.user;
                this.form.id = user.id;
                this.form.name = user.name;
                this.form.email = user.email;
                this.form = { ...this.form };
            } catch (error) {
                this.showToast('An unexpected error occurred', 'error');
            }
        },
        showToast(message, type) {
            this.toastMessage = message;
            this.toastType = type;
            this.showToastVisible = true;
            setTimeout(() => {
                this.showToastVisible = false;
            }, 3000);
        },
    },
};
</script>
