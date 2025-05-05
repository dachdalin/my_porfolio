<template>
    <AppLayout>
        <Toast v-if="showToastVisible" :type="toastType" :message="toastMessage" @close="showToastVisible = false"  />
        <div class="container bg-gray-100 dark:bg-gray-900 ">
            <div class="flex items-center justify-between py-8">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Experiense</h1>
                <button @click="openCreateModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add Experiense
                </button>
            </div>
            <div v-if="loading" class="flex justify-center my-8">
                <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-500"></div>
            </div>

            <!-- Error State -->
            <div v-else-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ error }}
            </div>
            <div v-else class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Start Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-if="experiense.data.length === 0">
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No data available</td>
                        </tr>
                        <tr v-for="(row,index) in experiense.data" :key="row.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ index + 1 + (experiense.current_page - 1) * experiense.per_page }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ row.title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ truncateString(row.description, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ row.start_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ row.end_date }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button @click="openEditModal(row)"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </button>
                                <button @click="confirmDelete(row)" class="text-red-600 hover:text-red-900">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="experiense.data && experiense.data.length > 0" class="mt-4 flex justify-between items-center">
                <div class="text-sm text-gray-700 dark:text-gray-200">
                    Showing {{ experiense.from }} to {{ experiense.to }} of
                    {{ experiense.total }} results
                </div>
                <div class="flex space-x-2">
                    <button v-for="page in getPageNumbers()" :key="page" @click="fetchProducts(page)" :class="[
                        'px-3 py-1 rounded',
                        page === experiense.current_page
                            ? 'bg-blue-600 text-white'
                            : 'bg-gray-200 hover:bg-gray-300',
                    ]">
                        {{ page }}
                    </button>
                </div>
            </div>
            <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl overflow-auto max-h-screen scroll-my-3">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-4">
                            {{ isEditing ? "Edit Experiense" : "Add New Experiense" }}
                        </h2>

                        <form @submit.prevent="submitForm">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input v-model="form.title" id="title" type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">
                                    Start Date
                                </label>
                                <input v-model="form.start_date" id="flatpickr-date" type="date"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                                    End Date
                                </label>
                                <input v-model="form.end_date" id="flatpickr-date" type="date"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Description
                                </label>
                                <textarea v-model="form.description" id="description"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    rows="3"></textarea>
                            </div>
                            <div class="flex justify-end space-x-2">
                                <button type="button" @click="showModal = false"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    :disabled="formSubmitting">
                                    {{ formSubmitting ? "Saving..." : "Save" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div v-if="showDeleteModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                    <div class="p-6 text-center">
                        <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
                        <p class="mb-4">
                            Are you sure you want to delete the Experiense "{{
                                productToDelete?.title
                            }}"? This action cannot be undone.
                        </p>

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="showDeleteModal = false"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </button>
                            <button type="button" @click="deleteProduct"
                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                :disabled="deleteSubmitting">
                                {{ deleteSubmitting ? "Deleting..." : "Delete" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "../layouts/AppLayout.vue";
import api from "../../services/api.js";
import Toast from "../Toast.vue";
export default {
    name: "Experiense",
    components: {
        AppLayout,
        Toast,
    },
    data() {
        return {
            experiense: {
                data: [],
                current_page: 1,
                from: 0,
                to: 0,
                total: 0,
                last_page: 1,
            },
            loading: true,
            error: null,
            showModal: false,
            showDeleteModal: false,
            isEditing: false,
            formSubmitting: false,
            deleteSubmitting: false,
            productToDelete: null,
            form: this.getEmptyForm(),
            techInput: "",
            showToastVisible: false,
            toastMessage: '',
            toastType: '',
            imagePreview: null,
        };
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        getEmptyForm() {
            return {
                title: "",
                description: "",
                start_date: "",
                end_date: "",
            };
        },
        async fetchProducts(page = 1) {
            this.loading = true;
            this.error = null;

            try {
                const response = await api.getExperiense(page);
                this.experiense = response.data.data;
            } catch (error) {
                console.error("Error fetching Experiense:", error);
                this.error = "Failed to load Experiense. Please try again.";
            } finally {
                this.loading = false;
            }
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = this.getEmptyForm();
            this.showModal = true;
        },
        openEditModal(exp) {
            this.isEditing = true;
            this.form = {
                ...exp,
            };
            this.showModal = true;
        },
        async submitForm() {
            this.formSubmitting = true;

            try {
                if (this.isEditing) {
                    await api.updateExperiense(this.form.id, this.form);
                } else {
                    await api.createExperiense(this.form);
                }

                this.showModal = false;
                this.fetchProducts(this.experiense.current_page);
                this.showToast("success", this.isEditing ? "Experiense updated successfully!" : "Experiense created successfully!");
            } catch (error) {
                console.error("Error saving Experiense:", error);
                alert("Failed to save Experiense. Please try again.");
            } finally {
                this.formSubmitting = false;
            }
        },
        confirmDelete(product) {
            this.productToDelete = product;
            this.showDeleteModal = true;
        },
        async deleteProduct() {
            this.deleteSubmitting = true;

            try {
                await api.deleteExperiense(this.productToDelete.id);
                this.showDeleteModal = false;
                this.fetchProducts(this.experiense.current_page);
                this.showToast("success", "Experiense deleted successfully!");
            } catch (error) {
                console.error("Error deleting Experiense:", error);
                alert("Failed to delete product. Please try again.");
            } finally {
                this.deleteSubmitting = false;
            }
        },
        getPageNumbers() {
            const pages = [];
            for (let i = 1; i <= this.experiense.last_page; i++) {
                pages.push(i);
            }
            return pages;
        },
        showToast(type, message) {
            this.toastType = type;
            this.toastMessage = message;
            this.showToastVisible = true;
            setTimeout(() => {
                this.showToastVisible = false;
            }, 5000);
        },
        dismissToast() {
            this.showToastVisible = false;
        },
        truncateString(str, length) {
            if (str.length > length) {
                return str.substring(0, length) + "...";
            }
            return str;
        },
    },
};
</script>
